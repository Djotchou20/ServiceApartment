<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 // home page navigations 
$routes->get('/', 'Home::index');
$routes->get('about_us', 'About::index');
$routes->get('apartment', 'Apartment::index');
$routes->get('apartment-view', 'Apartment::view');
$routes->get('search_view', 'Search::index');
$routes->get('properties/search', 'Search::search');
$routes->get('contact', 'Contact::index');
$routes->post('submit', 'Contact::submit');


//admin sign up and login Urls
$routes->get('admin-login', 'Admin\Login::index');
$routes->post('admin-login', 'Admin\Login::login');
$routes->get('logout', 'Admin\Login::logout');

// $routes->group(
//     '',
//     [
//         'namespace' =>  'App\Controllers'
//     ],
//     static function ($routes) {
//admin sign up and login Urls
$routes->get('admin-panel', 'Admin\SignupController::index');
$routes->post('register_apart', 'Admin\SignupController::register_apart');
$routes->get('register_apart', 'Admin\SignupController::register_apart');



$routes->get('admin/profiledash', 'Admin\Profile::index');
$routes->get('admin/settings', 'Admin\Profile::ProfileSettings');
$routes->post('admin/details/update/(:any)', 'Admin\Profile::userDetailsUpdate/$1');

$routes->get('admin/service-settings', 'Admin\SettingsController::index');
$routes->post('admin/service-settings-update/(:num)', 'Admin\SettingsController::DetailsUpdate/$1');

// $routes->post('submit-agents-data', 'Agents\SignupController::register_agents');
$routes->get('properties', 'Admin\PropertyController::index');
$routes->get('properties/create', 'Admin\PropertyController::create');
$routes->post('properties/store', 'Admin\PropertyController::store');
$routes->get('view/apartment/(:segment)', 'Apartment::ApartmentView/$1');

$routes->get('admin/properties/edit/(:num)', 'Admin\PropertyController::edit/$1');
$routes->post('admin/properties/update/(:num)', 'Admin\PropertyController::update/$1');
$routes->get('admin/properties/delete/(:num)', 'Admin\PropertyController::delete/$1');
$routes->get('admin/properties/delete-image/(:num)', 'Admin\PropertyController::deleteImage/$1');

$routes->get('admin/agents-list', 'Admin\AgentController::index');
// $routes->get('admin/register-agent', 'Admin\AgentController::agentsCreate');
$routes->get('admin/users-list', 'Admin\UserController::index');
$routes->get('admin/agents-list', 'Admin\AgentController::index');
$routes->get('admin/properties/agent-status/(:num)', 'Admin\AgentController::StatusVisibility/$1');
$routes->get('admin/properties/pay-status/(:num)', 'Admin\AgentController::PaymentStatus/$1');

$routes->get('admin/user-status/(:num)', 'Admin\UserController::StatusVisibility/$1');
$routes->get('payment-history', 'Admin\AgentController::payhistory');

$routes->get('admin/properties/status/(:num)', 'Admin\PropertyController::toggleVisibility/$1');
$routes->get('admin/register-agent', 'Admin\AgentController::agentsCreate');
$routes->get('admin/agent-settings/(:num)', 'Admin\AgentController::agentSettings/$1');
$routes->post('admin/agent-settings-update/(:num)', 'Admin\AgentController::agentDetailsUpdate/$1');

// $routes->post('admin/submit-agents-data', 'Admin\AgentController::registeragents');

// }payhistory
// );

//payment
$routes->get('payment', 'PaymentController::index');
$routes->get('payment/verify', 'PaymentController::verifyPayment');
// $routes->get('payment/success', 'PaymentController::paymentSuccess');
$routes->get('payment/failed', 'PaymentController::paymentFailed');

//agent login
$routes->get('agent-login', 'Agents\Login::agents');
$routes->post('agent-auth', 'Agents\Login::Auth');
$routes->get('logout', 'Agents\Login::agentLogout');

$routes->get('register-as-agent', 'Agents\SignupController::index');
$routes->get('agent/booking-history', 'Agents\BookingController::index');

$routes->get('agent/properties/status/(:num)', 'Agents\PropertyController::toggleVisibility/$1');
$routes->post('submit-agents-data', 'Agents\SignupController::register_agents');
$routes->get('agent/payment-history', 'Agents\PaymentController::index');
$routes->get('agent/apartments', 'Agents\PropertyController::index');
$routes->get('agent/profiledash', 'Agents\Profile::index');

$routes->get('agent/settings', 'Agents\Profile::ProfileSettings');
$routes->post('agent/details/update/(:any)', 'Agents\Profile::userDetailsUpdate/$1');
$routes->post('agent/submit/id/(:any)', 'Agents\Profile::AgentID/$1');
$routes->post('process-payment', 'Agents\Profile::index');


//main users auths & loggs
// $routes->get('bookings/form/(:num)', 'Users\BookingsController::form/$1'); // Booking form for a specific property
$routes->get('bookings/checkout/(:num)', 'Users\BookingsController::success/$1'); 
$routes->post('user/bookings/create', 'Users\BookingsController::create'); // Handle booking creation
$routes->get('payment/success', 'Users\BookingsController::paymentSuccess'); 


$routes->get('user-login', 'Users\Login::users');
$routes->post('login', 'Users\Login::userlogin');
$routes->get('logout', 'Users\Login::userLogout');
$routes->get('user-signup', 'Users\SignupController::index');
$routes->post('submit-user-data', 'Users\SignupController::register_users');
$routes->get('user/profile', 'Users\Profile::index');
$routes->get('user/settings', 'Users\Profile::ProfileSettings');
$routes->post('user/details/update/(:any)', 'Users\Profile::userDetailsUpdate/$1');
// Booking success page






