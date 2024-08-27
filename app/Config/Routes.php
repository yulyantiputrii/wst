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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/formula', 'Home::formula'); //collaborative filtering

$routes->get('/', 'Home::index');
$routes->get('/homeedit', 'Home::homeedit', );
$routes->get('/tour', 'Home::tour', );
$routes->get('/trekking', 'Home::trekking', );
$routes->get('/alam', 'Home::alam', );
$routes->get('/budaya', 'Home::budaya', );
$routes->get('/kuliner', 'Home::kuliner', );
$routes->get('/religi', 'Home::religi', );
$routes->get('/detailtour', 'Home::detailtour', ); 
$routes->get('/detailtour/(:num)', 'Home::detailtour/$1', ); //detail tour
$routes->get('/produk/detail/(:num)', 'AdminProduk::detail/$1');


$routes->post('/rating/add', 'RatingController::add');


$routes->get('/profile', 'Profile::index', ['filter' => 'role:user']);
$routes->post('/profile/update/(:num)', 'Profile::update/$1', ['filter' => 'role:user']);

// keranjang dan checkout
$routes->get('/cart', 'Cart::index', ['filter' => 'role:user']);
$routes->get('/cart/index', 'Cart::index', ['filter' => 'role:user']);
$routes->post('/cart/addcart', 'Cart::addcart', ['filter' => 'role:user']);
$routes->get('/cart/delete/(:num)', 'Cart::delete/$1', ['filter' => 'role:user']);
$routes->get('/cart/prosescheckout/(:num)', 'Cart::prosescheckout/$1', ['filter' => 'role:user']); //sblm checkout
$routes->post('/cart/addtransaksi/(:num)', 'Cart::addtransaksi/$1', ['filter' => 'role:user']);
$routes->get('/history', 'Cart::history', ['filter' => 'role:user']);
$routes->get('/detailhistory/(:num)', 'Cart::detailhistory/$1', ['filter' => 'role:user']);
$routes->post('/rate', 'Cart::rate', ['filter' => 'role:user']);
$routes->post('/uploadbuktibayar/(:num)', 'Cart::uploadbuktibayar/$1', ['filter' => 'role:user']);

// admin
// ADMIN
$routes->get('/admin', 'AdminHome::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'AdminHome::index', ['filter' => 'role:admin']);

$routes->get('/profile-admin', 'AdminProfile::index', ['filter' => 'role:admin']);
$routes->get('/profile-admin/index', 'AdminProfile::index', ['filter' => 'role:admin']);

// user Admin
$routes->get('/useradmin', 'AdminUser::index', ['filter' => 'role:admin']); //lihat semua list data
$routes->get('/useradmin/index', 'AdminUser::index', ['filter' => 'role:admin']); //lihat semua  list data
$routes->get('/useradmin/(:num)', 'AdminUser::detail/$1', ['filter' => 'role:admin']); //lihat detail data

// Kategori Admin
$routes->get('/kategoriadmin', 'AdminKategori::index', ['filter' => 'role:admin']); //list semua data kategori
$routes->get('/kategoriadmin/index', 'AdminKategori::index', ['filter' => 'role:admin']); //list semua data kategori
$routes->get('/kategoriadmin/add', 'AdminKategori::add', ['filter' => 'role:admin']); //input untuk create data
$routes->post('/kategoriadmin/save', 'AdminKategori::save', ['filter' => 'role:admin']); //save data yang telah diinput
$routes->get('/kategoriadmin/(:num)', 'AdminKategori::detail/$1', ['filter' => 'role:admin']); //lihat detail data
$routes->post('/kategoriadmin/update/(:num)', 'AdminKategori::update/$1', ['filter' => 'role:admin']); //update data yang telah diinput
$routes->get('/kategoriadmin/delete/(:num)', 'AdminKategori::delete/$1', ['filter' => 'role:admin']); //input untuk create data

// Product Admin
$routes->get('/produkadmin', 'AdminProduk::index', ['filter' => 'role:admin']); //list semua data Product
$routes->get('/produkadmin/index', 'AdminProduk::index', ['filter' => 'role:admin']); //list semua data Product
$routes->get('/produkadmin/add', 'AdminProduk::add', ['filter' => 'role:admin']); //list semua data Product
$routes->post('/produkadmin/save', 'AdminProduk::save', ['filter' => 'role:admin']); //list semua data Product
$routes->get('/produkadmin/edit/(:num)', 'AdminProduk::edit/$1', ['filter' => 'role:admin']); //list semua data Product
$routes->post('/produkadmin/update/(:num)', 'AdminProduk::update/$1', ['filter' => 'role:admin']); //list semua data Product
$routes->get('/produkadmin/delete/(:num)', 'AdminProduk::delete/$1', ['filter' => 'role:admin']); //list semua data Product

// Rating Admin
$routes->get('/ratingadmin', 'AdminRating::index', ['filter' => 'role:admin']);
$routes->get('/ratingadmin/index', 'AdminRating::index', ['filter' => 'role:admin']);
$routes->get('/ratingadmin/delete/(:num)', 'AdminRating::delete/$1', ['filter' => 'role:admin']); // Tambahkan route ini

// Transaksi Admin
$routes->get('/transaksiadmin', 'AdminTransaksi::index', ['filter' => 'role:admin']);
$routes->get('/transaksiadmin/index', 'AdminTransaksi::index', ['filter' => 'role:admin']);
$routes->get('/transaksiadmin/view/(:num)', 'AdminTransaksi::view/$1', ['filter' => 'role:admin']);
$routes->post('/transaksiupdate/(:num)', 'AdminTransaksi::update/$1', ['filter' => 'role:admin']);


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
