<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class TokenAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $authHeader = $request->getHeaderLine('Authorization');

        if (empty($authHeader) || !str_starts_with($authHeader, 'Bearer ')) {
            return service('response')
                ->setJSON(['message' => 'Token tidak ditemukan'])
                ->setStatusCode(401);
        }

        $token = str_replace('Bearer ', '', $authHeader);

        $userModel = new UserModel();
        $user = $userModel->where('token', $token)->first();

        if (!$user) {
            return service('response')
                ->setJSON(['message' => 'Token tidak valid'])
                ->setStatusCode(401);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // tidak perlu apa-apa
    }
}