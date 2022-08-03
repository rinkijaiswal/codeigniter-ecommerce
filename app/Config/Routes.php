<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// basic routes
$routes->get('/', 'Home::index');
$routes->get('/admin/login', 'Admin::login');
$routes->post('/admin/login', 'Admin::login');
$routes->get('/admin/','Admin::index');
$routes->get('/admin/contact','Admin::contact');
$routes->get('/admin/dashboard','Admin::dashboard');
$routes->get('/order/checkout','OrderController::index');
$routes->post('/order/checkout','OrderController::index');
$routes->get('/success/(:any)','Home::success/$1');
$routes->get('/failure/(:any)/(:any)/(:any)','Home::failure/$1/$2/$3');
$routes->get('/orders/all','Admin::orders');
$routes->get('/about','Home::about');
$routes->get('/contact','Home::contact');
$routes->post('/contact','Home::contact');

// user routes
$routes->group('user',function($routes){
    $routes->get('/','User::index');
    $routes->get('/signup','User::signup');
    $routes->post('/signup','User::signup');
    $routes->get('/login','User::login');
    $routes->post('/login','User::login');
    $routes->get('/logout','User::logout');
    $routes->get('/all','User::all');
    $routes->post('/edit/(:any)','User::edit/$1');
});

// book routes
$routes->group('book',function($routes){
    $routes->get('/create','Book::create');
    $routes->post('/create','Book::create');
    $routes->get('/view','Book::view');
    $routes->get('/edit/(:num)','Book::edit/$1');
    $routes->post('/edit/(:num)','Book::edit/$1');
    $routes->get('/delete/(:num)','Book::delete/$1');
    $routes->get('/single/(:num)','Book::single/$1');
    $routes->get('/search/', 'Book::search');
    $routes->post('/search/', 'Book::search');
    $routes->get('/category/(:alpha)','Book::category/$1');
});

// category routes
$routes->group('category',function($routes){
    $routes->get('/create','Category::create');
    $routes->post('/create','Category::create');
    $routes->get('/edit/(:num)','Category::edit');
    $routes->post('/edit/(:num)','Category::edit');
    $routes->get('/view','Category::view');
    $routes->get('/delete/(:num)','Caetgory::delete');
});

// cart routes
$routes->group('cart',function($routes){
    $routes->get('/','Cart::index');
    $routes->post('/add','Cart:add');
    $routes->post('/update/(:num)','Cart::update/$1');
    $routes->get('/delete/(:num)','Cart::delete/$1');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
