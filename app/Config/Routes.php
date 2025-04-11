<?php

namespace Config;

$routes = service('routes');

// Custom routes
$routes->get('/', 'WorkRequestController::index');
$routes->get('/blog', 'BlogController::index');
$routes->get('/blog/(:segment)', 'BlogController::show/$1');
$routes->get('/test-blog', 'TestBlogController::index');
// Removed duplicate detail route since show handles it; use show consistently
$routes->post('/work-request/submit', 'WorkRequestController::submit');

$routes->group('admin', function($routes) {
    $routes->get('/', 'AdminController::index', ['as' => 'admin.login']);
    $routes->post('login', 'AdminController::login');
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('logout', 'AdminController::logout');
    $routes->get('work-requests', 'AdminWorkRequestController::index');
    $routes->get('service-management', 'ServiceManagementController::index');
    $routes->get('service-management/add', 'ServiceManagementController::showUploadForm');
    $routes->post('service-management/add', 'ServiceManagementController::addService');
    $routes->get('service-management/delete/(:num)', 'ServiceManagementController::deleteService/$1');
    $routes->get('blog-management', 'AdminBlogController::index');
    $routes->get('blog-management/create', 'AdminBlogController::create');
    $routes->post('blog-management/store', 'AdminBlogController::store');
    $routes->get('blog-management/edit/(:num)', 'AdminBlogController::edit/$1');
    $routes->post('blog-management/update/(:num)', 'AdminBlogController::update/$1');
    $routes->get('blog-management/delete/(:num)', 'AdminBlogController::delete/$1');
    $routes->get('staff-management', 'StaffManagementController::index');
    $routes->get('staff-management/add', 'StaffManagementController::showUploadForm');
    $routes->post('staff-management/add', 'StaffManagementController::addStaff');
    $routes->get('staff-management/delete/(:num)', 'StaffManagementController::deleteStaff/$1');
    $routes->get('admin-management', 'AdminManagementController::index');
    $routes->get('admin-management/create', 'AdminManagementController::create');
    $routes->post('admin-management/store', 'AdminManagementController::store');
    $routes->get('admin-management/delete/(:num)', 'AdminManagementController::delete/$1');
    });
    