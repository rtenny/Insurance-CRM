<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Redirect logged-in users to the dashboard
//$routes->get('/', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('/', 'DashboardController::index');
$routes->get('dashboard', 'DashboardController::index');


$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::register');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');

$routes->get('logout', 'AuthController::logout');

$routes->get('contacts', 'ContactsController::index');  // View all contacts
$routes->get('contacts/create', 'ContactsController::create');  // Show create form
$routes->post('contacts/store', 'ContactsController::store');  // Handle form submission
$routes->get('contacts/edit/(:num)', 'ContactsController::edit/$1');  // Show edit form
$routes->post('contacts/update/(:num)', 'ContactsController::update/$1');  // Handle update
$routes->get('contacts/delete/(:num)', 'ContactsController::delete/$1');  // Delete contact
