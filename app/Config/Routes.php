<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 // home page navigations 
$routes->get('/', 'Home::index');
$routes->get('about_us', 'About::index');
$routes->get('apartment', 'Apartment::index');
$routes->get('apartment-view', 'ApartmentDetailsController::index');

$routes->get('contact', 'Contact::index');
$routes->post('submit', 'Contact::submit');

//admin sign up and login Urls
$routes->get('admin-panel', 'Admin\SignupController::index');
$routes->post('register_apart', 'Admin\SignupController::register_apart');
$routes->get('register_apart', 'Admin\SignupController::register_apart');

$routes->get('admin-login', 'Admin\Login::index');
$routes->post('admin-login', 'Admin\Login::login');
$routes->get('logout', 'Admin\Login::logout');

$routes->get('admin/profiledash', 'Admin\Profile::index');
$routes->get('admin/settings', 'Admin\Profile::ProfileSettings');
$routes->post('admin/details/update/(:any)', 'Admin\Profile::userDetailsUpdate/$1');


//agent login
$routes->get('agent-login', 'Agents\Login::agents');
$routes->post('agent-login', 'Agents\Login::agentLogin');
$routes->get('logout', 'Agents\Login::agentLogout');

$routes->get('register-as-agent', 'Agents\SignupController::index');
$routes->post('submit-agents-data', 'Agents\SignupController::register_agents');
$routes->get('payment-history', 'Agents\PaymentController::index');
$routes->get('agent/profiledash', 'Agents\Profile::index');
$routes->get('agent/settings', 'Agents\Profile::ProfileSettings');
$routes->post('agent/details/update/(:any)', 'Agents\Profile::userDetailsUpdate/$1');
$routes->post('agent/submit/id/(:any)', 'Agents\Profile::AgentID/$1');
$routes->post('process-payment', 'Agents\Profile::index');


//main users auths & loggs
$routes->get('user-login', 'Users\Login::users');
$routes->post('login', 'Users\Login::userlogin');
$routes->get('logout', 'Users\Login::userLogout');
$routes->get('user-signup', 'Users\SignupController::index');
$routes->post('submit-user-data', 'Users\SignupController::register_users');
$routes->get('user/profile', 'Users\Profile::index');
$routes->get('user/settings', 'Users\Profile::ProfileSettings');
$routes->post('user/details/update/(:any)', 'Users\Profile::userDetailsUpdate/$1');


$routes->get('search_view', 'Search::index');
$routes->get('search/searchData', 'Search::searchData');

$routes->get('properties', 'Agents\PropertyController::index');
$routes->get('properties/create', 'Agents\PropertyController::create');
$routes->post('properties/store', 'Agents\PropertyController::store');
$routes->get('properties/edit/(:num)', 'Agents\PropertyController::edit/$1');
$routes->post('properties/update/(:num)', 'Agents\PropertyController::update/$1');
$routes->get('properties/delete/(:num)', 'Agents\PropertyController::delete/$1');
