<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route
$routes->get('/', 'HomeController::index');

// Authentication routes
$routes->get('/login', 'AuthController::login');
$routes->post('/auth/loginUser', 'AuthController::loginUser');
$routes->get('/register', 'AuthController::register');
$routes->post('/auth/storeUser', 'AuthController::storeUser');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/reset_password', 'AuthController::reset_password');

// Home route
$routes->get('/home', 'HomeController::index');

// Register Event route
$routes->get('/pendaftaran_kegiatan', 'EventController::pendaftaran_kegiatan');
$routes->post('/event/store', 'EventController::store');
