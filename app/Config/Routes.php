<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('muni', 'Muni::index');

/* Anulado
$routes->get('muni', function() {
    return view('muni'); // Carga /app/Views/muni.php
});
*/
$routes->get('descargar', function() {
    return view('descargar'); // Carga /app/Views/descargar.php
}, ['filter' =>'session']);


$routes->get('subir', function() {
    return view('subir'); // Subir /app/Views/subir.php
});

$routes->get('subido', function() {
    return view('subido'); // Subir /app/Views/subido.php
});

$routes->group('empleados', ['filter' => 'group:admin'], function($routes) {
    $routes->get('/', 'Empleados::index');
    $routes->get('create', 'Empleados::create');
    $routes->post('store', 'Empleados::store');
    $routes->get('edit/(:num)', 'Empleados::edit/$1');
    $routes->post('update/(:num)', 'Empleados::update/$1');
    $routes->get('delete/(:num)', 'Empleados::delete/$1');
});

// Rutas de Empleados
/*
$routes->get('/empleados', 'Empleados::index');
$routes->get('/empleados/create', 'Empleados::create');
$routes->post('/empleados/store', 'Empleados::store');
$routes->get('/empleados/edit/(:num)', 'Empleados::edit/$1');
$routes->post('/empleados/update/(:num)', 'Empleados::update/$1');
$routes->get('/empleados/delete/(:num)', 'Empleados::delete/$1');
*/

service('auth')->routes($routes);

$routes->group('perfil', ['filter' => 'session'], function($routes) {
    $routes->get('cambiar-password', 'PerfilController::cambiarPassword');
    $routes->post('actualizar-password', 'PerfilController::actualizarPassword');
});

// app/Config/Routes.php
/*
$routes->group('users', function($routes) {
    $routes->get('/', 'Users::index');
    $routes->get('create', 'Users::create');
    $routes->post('store', 'Users::store');
    $routes->get('edit/(:num)', 'Users::edit/$1');
    $routes->post('update/(:num)', 'Users::update/$1');
    $routes->get('delete/(:num)', 'Users::delete/$1');
});
*/
// Solamente usuarios ADMIN
$routes->group('users', ['filter' => 'group:admin'], function($routes) {
    $routes->get('/', 'Users::index');
    $routes->get('create', 'Users::create');
    $routes->post('store', 'Users::store');
    $routes->get('edit/(:num)', 'Users::edit/$1');
    $routes->post('update/(:num)', 'Users::update/$1');
    $routes->get('delete/(:num)', 'Users::delete/$1');
});