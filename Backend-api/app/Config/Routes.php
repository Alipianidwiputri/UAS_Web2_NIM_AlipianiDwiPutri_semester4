<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// ============ API ROUTES ============
$routes->group('api', function ($routes) {

    // Auth (tidak perlu token)
    $routes->post('login', 'Api\AuthController::login');
    $routes->post('logout', 'Api\AuthController::logout');

    // Categories
    $routes->get('categories', 'Api\CategoryController::index');
    $routes->get('categories/(:num)', 'Api\CategoryController::show/$1');
    $routes->post('categories', 'Api\CategoryController::create', ['filter' => 'tokenauth']);
    $routes->put('categories/(:num)', 'Api\CategoryController::update/$1', ['filter' => 'tokenauth']);
    $routes->delete('categories/(:num)', 'Api\CategoryController::delete/$1', ['filter' => 'tokenauth']);

    // Books
    $routes->get('books', 'Api\BookController::index');
    $routes->get('books/(:num)', 'Api\BookController::show/$1');
    $routes->post('books', 'Api\BookController::create', ['filter' => 'tokenauth']);
    $routes->put('books/(:num)', 'Api\BookController::update/$1', ['filter' => 'tokenauth']);
    $routes->delete('books/(:num)', 'Api\BookController::delete/$1', ['filter' => 'tokenauth']);

    // Loans
    $routes->get('loans', 'Api\LoanController::index');
    $routes->get('loans/(:num)', 'Api\LoanController::show/$1');
    $routes->post('loans', 'Api\LoanController::create', ['filter' => 'tokenauth']);
    $routes->put('loans/(:num)', 'Api\LoanController::update/$1', ['filter' => 'tokenauth']);
    $routes->delete('loans/(:num)', 'Api\LoanController::delete/$1', ['filter' => 'tokenauth']);

    // Members
    $routes->get('members', 'Api\MemberController::index');
    $routes->get('members/(:num)', 'Api\MemberController::show/$1');
    $routes->post('members', 'Api\MemberController::create', ['filter' => 'tokenauth']);
    $routes->put('members/(:num)', 'Api\MemberController::update/$1', ['filter' => 'tokenauth']);
    $routes->delete('members/(:num)', 'Api\MemberController::delete/$1', ['filter' => 'tokenauth']);

});