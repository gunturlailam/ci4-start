<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/guntur', 'Profil::index');
$routes->get('/produk', 'Produk::index');
$routes->get('/kasir', 'Kasir::index');
$routes->get('/sppd', 'Sppd::index');
$routes->post('/simpan', 'Sppd::simpan');
$routes->get('/sppd/tampil', 'Sppd::tampil');
$routes->get('/item', 'Item::index');

$routes->get('/barang', 'Barang::index');
$routes->post('/simpanbarang', 'Barang::simpanbarang');
$routes->get('/tampilbarang', 'Barang::tampil');

$routes->get('/kamar', 'Kamar::index');
$routes->post('/simpankamar', 'Kamar::simpankamar');
$routes->get('/tampilkamar', 'Kamar::tampil');
