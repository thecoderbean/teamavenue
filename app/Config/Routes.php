<?php

namespace Config;

$routes = service('routes');

// Load the system's routing file first


// Custom routes
$routes->get('/', 'WorkRequestController::index'); // Front page
$routes->post('/work-request/submit', 'WorkRequestController::submit'); // Work request submission
$routes->group('admin', function($routes) {
    $routes->get('/', 'AdminController::index', ['as' => 'admin.login']);
    $routes->post('login', 'AdminController::login');
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('logout', 'AdminController::logout');
});