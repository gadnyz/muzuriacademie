<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('verify', 'TestVerification::index');

// Registration
$routes->get('registration/success/(:num)', 'Registration::success/$1');
$routes->get('registration/index/(:num)', 'Registration::index/$1');
$routes->get('registration', 'Registration::index');
$routes->post('registration/create', 'Registration::create');

// Admin
$routes->group('admin', function ($routes) {
    // Auth
    $routes->get('login', 'Admin\Auth::login');
    $routes->post('auth/attemptLogin', 'Admin\Auth::attemptLogin');
    $routes->get('auth/logout', 'Admin\Auth::logout');
    $routes->get('auth/logout', 'Admin\Auth::logout');
    // $routes->get('auth/create_admin', 'Admin\Auth::create_admin'); // Removed for security

    // Dashboard
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('dashboard/export', 'Admin\Dashboard::export');
    $routes->get('dashboard/update_db', 'Admin\Dashboard::seedInitial');
});

// Redirect /admin to /admin/dashboard (which handles login check)
$routes->get('admin', function () {
    return redirect()->to('/admin/dashboard');
});
