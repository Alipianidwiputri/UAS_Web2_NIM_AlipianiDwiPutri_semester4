<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class AuthController extends ResourceController
{
    public function login()
    {
        $data = $this->request->getJSON(true);
        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if (!$user) {
            return $this->failUnauthorized('Username tidak ditemukan');
        }

        if (!password_verify($password, $user['password'])) {
            return $this->failUnauthorized('Password salah');
        }

        // Generate token sederhana
        $token = bin2hex(random_bytes(32));
        $userModel->update($user['id'], ['token' => $token]);

        return $this->respond([
            'message' => 'Login berhasil',
            'token'   => $token,
            'username' => $user['username']
        ], 200);
    }

    public function logout()
    {
        $token = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $token);

        $userModel = new UserModel();
        $user = $userModel->where('token', $token)->first();

        if ($user) {
            $userModel->update($user['id'], ['token' => null]);
        }

        return $this->respond(['message' => 'Logout berhasil'], 200);
    }
}