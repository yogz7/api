<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('produk', 'produk::index');
$routes->get('produk/(:segment)', 'produk::show/$1');
$routes->post('produk/create', 'produk::create');
$routes->post('produk/edit/(:segment)', 'produk::update/$1');
$routes->delete('produk/(:segment)', 'produk::delete/$1');

$routes->post('register', 'RegistrationController::create');

