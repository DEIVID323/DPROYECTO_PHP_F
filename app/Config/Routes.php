<?php


use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Inicio::index');
$routes->get('/login', 'Inicio::login');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/validarLogin', 'Auth::validarLogin');
$routes->post('/auth/registrar', 'Auth::registrar');
$routes->post('inicio/validarLogin', 'Auth::validarLogin');
$routes->get('/inicio', 'Inicio::index');
$routes->get('/cerrarSesion', 'Inicio::cerrarSesion');
$routes->get('/admin', 'Inicio::admin');


$routes->get('/productos', 'Productos::index');
$routes->get('/productos/crear', 'Productos::crear');
$routes->post('/productos/guardar', 'Productos::guardar');
$routes->get('/productos/editar/(:num)', 'Productos::editar/$1');
$routes->post('/productos/actualizar/(:num)', 'Productos::actualizar/$1');
$routes->get('/productos/eliminar/(:num)', 'Productos::eliminar/$1');


$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/usuarios/', 'Usuarios::index');


$routes->get('/usuarios', 'Usuarios::index');
$routes->get('/usuarios/crear', 'Usuarios::crear');
$routes->post('/usuarios/guardar', 'Usuarios::guardar');
$routes->get('/usuarios/editar/(:num)', 'Usuarios::editar/$1');
$routes->post('/usuarios/actualizar/(:num)', 'Usuarios::actualizar/$1');
$routes->get('/usuarios/eliminar/(:num)', 'Usuarios::eliminar/$1');







