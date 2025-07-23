<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Transactions::index'); // Mengatur halaman utama ke daftar transaksi
$routes->get('/transactions', 'Transactions::index');
$routes->get('/transactions/create', 'Transactions::create');
$routes->post('/transactions/store', 'Transactions::store');
