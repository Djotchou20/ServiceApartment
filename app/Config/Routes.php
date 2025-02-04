<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('about_us', 'About::index');
$routes->get('apartment', 'Apartment::index');
$routes->get('contact', 'Contact::index');
$routes->post('submit', 'Contact::submit');

$routes->get('register_apartment', 'Admin\SignupController::index');
$routes->post('register_apart', 'Admin\SignupController::register_apart');
$routes->get('register_apart', 'Admin\SignupController::register_apart');

$routes->get('admin-login', 'Admin\Login::index');
$routes->post('admin-login', 'Admin\Login::login');
$routes->get('admin-logout', 'Admin\Login::logout');

//agent login
$routes->get('login', 'Agents\Login::agents');
$routes->post('login', 'Agents\Login::agentLogin');
$routes->get('logout', 'Agents\Login::agentLogout');

$routes->get('register-agents', 'Agents\SignupController::index');
$routes->post('submit-agents-data', 'Agents\SignupController::register_agents');
$routes->get('admin/profiledash', 'Admin\Profile::index');
$routes->get('admin/settings', 'Admin\Profile::ProfileSettings');
$routes->post('admin/details/update/(:any)', 'Admin\Profile::userDetailsUpdate/$1');

// $routes->get('register_apart', 'Agents\SignupController::register_age');

$routes->get('payment-history', 'Agents\paymentController::index');
$routes->get('agent/profiledash', 'Agents\Profile::index');
$routes->get('user/settings', 'Agents\Profile::ProfileSettings');
$routes->post('agent/details/update/(:any)', 'Agents\Profile::userDetailsUpdate/$1');
$routes->post('agent/submit/id/(:any)', 'Agents\Profile::AgentID/$1');
$routes->post('process-payment', 'Agents\Profile::index');

$routes->get('search_view', 'Search::index');
$routes->get('search/searchData', 'Search::searchData');


$routes->get('properties', 'Agents\PropertyController::index');
$routes->get('properties/create', 'Agents\PropertyController::create');
$routes->post('properties/store', 'Agents\PropertyController::store');
$routes->get('properties/edit/(:num)', 'Agents\PropertyController::edit/$1');
$routes->post('properties/update/(:num)', 'Agents\PropertyController::update/$1');
$routes->get('properties/delete/(:num)', 'Agents\PropertyController::delete/$1');
