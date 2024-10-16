<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'AuthController::login');
$routes->get('register', 'AuthController::register');
$routes->post('auth/storeUser', 'AuthController::storeUser');
$routes->post('auth/loginUser', 'AuthController::loginUser');
$routes->get('logout', 'AuthController::logout');

$routes->get('dashboard', 'DashboardController::index');
$routes->get('about', 'AboutController::index');

