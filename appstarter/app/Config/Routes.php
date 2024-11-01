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

// Event registration for users
$routes->get('/pendaftaran_kegiatan', 'EventController::pendaftaran_kegiatan');
$routes->post('/event/store', 'EventController::store');

// Admin routes (no filters)
$routes->get('/admin/dashboard', 'AdminController::dashboard'); // Admin dashboard route without filters
$routes->get('/admin/event/(:num)', 'AdminController::viewEvent/$1'); // View specific event details
$routes->get('/admin/add_event', 'AdminController::createEvent'); // Show form to add a new event
$routes->post('/admin/store_event', 'AdminController::storeEvent'); // Store a new event in the database
$routes->get('/admin/event/edit/(:num)', 'AdminController::editEvent/$1'); // Show form to edit an event
$routes->post('/admin/event/update/(:num)', 'AdminController::updateEvent/$1'); // Update an existing event
$routes->post('/admin/event/delete/(:num)', 'AdminController::deleteEvent/$1'); // Delete an event

$routes->get('/Views/dashboard', 'UserController::dashboard');
