<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
// $routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], '/login', 'Home::login');
$routes->match(['get', 'post'], '/register', 'Home::register');
$routes->get('/product/(:num)', 'Home::productDetail/$1');
$routes->get('/shopping-cart', 'Home::cart');
$routes->match(['get', 'post'], '/checkout', 'Home::checkOut');
$routes->get('/shop', 'Home::shop');
$routes->get('/contacts', 'Home::contacts');


$routes->group('admins', static function ($routes) {
  $routes->get('/', 'Admin::index');
  $routes->group('user', static function ($routes) {
    $routes->get('/', 'Admin::userList');
    $routes->match(['get', 'post'], 'add', 'Admin::userAdd');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Admin::userEdit/$1');
    $routes->get('delete/(:num)', 'Admin::userDelete/$1');
  });
  $routes->group('product', static function ($routes) {
    $routes->get('/', 'Admin::productList');
    $routes->match(['get', 'post'], 'add', 'Admin::productAdd');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Admin::productEdit/$1');
    $routes->get('delete/(:num)', 'Admin::productDelete/$1');
  });
  $routes->group('category', static function ($routes) {
    $routes->get('/', 'Admin::categoryList');
    $routes->match(['get', 'post'], 'add', 'Admin::categoryAdd');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Admin::categoryEdit/$1');
  });
  $routes->group('order', static function ($routes) {
    $routes->get('/', 'Admin::orderList');
    $routes->match(['get', 'post'], 'add', 'Admin::orderAdd');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Admin::orderEdit/$1');
    $routes->get('edit/(:num)', 'Admin::orderEdit/$1');
  });
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}