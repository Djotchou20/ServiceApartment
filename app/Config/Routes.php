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
$routes->get('login', 'Admin\Login::index');
$routes->post('login', 'Admin\Login::login');
$routes->get('logout', 'Admin\Login::logout');

$routes->get('user/profiledash', 'Admin\Profile::index');
$routes->get('user/settings', 'Admin\Profile::ProfileSettings');
$routes->post('agent/details/update/(:any)', 'Admin\Profile::userDetailsUpdate/$1');
$routes->post('agent/submit/id/(:any)', 'Admin\Profile::AgentID/$1');
$routes->post('process-payment', 'Admin\Profile::index');

$routes->get('search_view', 'Search::index');
$routes->get('search/searchData', 'Search::searchData');


$routes->get('properties', 'Admin\PropertyController::index');
$routes->get('properties/create', 'Admin\PropertyController::create');
$routes->post('properties/store', 'Admin\PropertyController::store');
$routes->get('properties/edit/(:num)', 'Admin\PropertyController::edit/$1');
$routes->post('properties/update/(:num)', 'Admin\PropertyController::update/$1');
$routes->get('properties/delete/(:num)', 'Admin\PropertyController::delete/$1');