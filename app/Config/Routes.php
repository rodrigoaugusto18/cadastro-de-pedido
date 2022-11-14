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
 $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('escolha', 'Escolha::index');
$routes->post('escolha', 'Escolha::index');
$routes->get('pessoas', 'Pessoas::index');
$routes->get('pessoas/inserir', 'Pessoas::inserir');
$routes->post('pessoas/inserir', 'Pessoas::inserir');
$routes->get('pessoas/editar/(:num)', 'Pessoas::editar/$1');
$routes->post('pessoas/editar', 'Pessoas::editar');
$routes->get('fisica', 'Fisica::index');
$routes->get('fisica/inserir', 'Fisica::inserir');
$routes->post('fisica/inserir', 'Fisica::inserir');
$routes->get('fisica/editar/(:num)', 'Fisica::editar/$1');
$routes->post('fisica/editar/(:num)', 'Fisica::editar/$1');
$routes->get('fisica/excluir/(:num)', 'Fisica::excluir/$1');
$routes->post('fisica/excluir/(:num)', 'Fisica::excluir/$1');
$routes->get('juridica', 'Juridica::index');
$routes->get('juridica/inserir', 'Juridica::inserir');
$routes->post('juridica/inserir', 'Juridica::inserir');
$routes->get('juridica/editar/(:num)', 'Juridica::editar/$1');
$routes->post('juridica/editar/(:num)', 'Juridica::editar/$1');
$routes->get('juridica/excluir/(:num)', 'Juridica::excluir/$1');
$routes->post('juridica/excluir/(:num)', 'Juridica::excluir/$1');
$routes->get('produtos', 'Produtos::index');
$routes->post('produtos', 'Produtos::index');
$routes->get('produtos/inserir', 'Produtos::inserir');
$routes->post('produtos/inserir', 'Produtos::inserir');
$routes->get('produtos/editar/(:num)', 'Produtos::editar/$1');
$routes->post('produtos/editar/(:num)', 'Produtos::editar/$1');
$routes->get('produtos/excluir/(:num)', 'Produtos::excluir/$1');
$routes->post('produtos/excluir/(:num)', 'Produtos::excluir/$1');
$routes->get('status', 'Status::inserir');
$routes->post('status', 'Status::inserir');
$routes->get('visualizar', 'Visualizar::index');
$routes->post('visualizar', 'Visualizar::index');

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
