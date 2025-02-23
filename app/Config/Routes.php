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

$routes->get('contacts', 'ContactsController::index');

/*
// Optionally, add a /dashboard route to test successful login:
$routes->get('dashboard', function () {
    if (!session()->get('loggedIn')) {
        return redirect()->to('/login');
    }
    // Render a view or display a simple message
    echo "Welcome to the Dashboard, " . session()->get('username') . "!";
});
*/

