<?php

use App\Controllers\feedback;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('feedback', 'Feedback::feedback');
$routes->post('feedback/submitFeedback', 'Feedback::submitFeedback');

$routes->get('feedback-table', 'Feedback::tampilfeedback');
$routes->get('events', 'EventController::index');




