<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'WorkRequestController::index');
$routes->post('/work-request/submit', 'WorkRequestController::submit');
$routes->group('admin', function($routes) {
    $routes->get('/', 'AdminController::index', ['as' => 'admin.login']);
    $routes->post('login', 'AdminController::login');
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('logout', 'AdminController::logout');
});