<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;
use App\Controllers\Movies;
use App\Controllers\Rest;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


//Membuat beragam routes dengan 1 baris route
$routes->resource('/api', ['controller' => 'Rest']);

//menampilkan halaman tanpa perlu logic
$routes->view('/home', 'welcome_message');


$routes->get("/redirect", [Home::class, 'redirect']);
$routes->get('/header', [Home::class, 'header']);
$routes->post('/file', [Home::class, 'files']);
$routes->get('/query', [Home::class, 'withQuery']);
$routes->get('/negotiation', [Home::class, 'negotiation']);
$routes->get('/put', [Home::class, 'putView']);
$routes->put('/put', [Home::class, 'put']);

$routes->get("/render", [Home::class, 'render']);


$routes->get('/api/movies', [Movies::class, 'getAllJson']);

// $routes->get('/movie', 'Movies::index', ['as' => 'movie']);
// $routes->get('/movie/create', 'Movies::create');
// $routes->post('/movie', 'Movies::add');
// $routes->get('/movie/ex', [Movies::class, 'exception']);
// $routes->get('/movie/(:segment)', [Movies::class, 'show']);
// $routes->get('/movie/(:segment)/(:num)', [Movies::class, 'show']);

//Melakukan grouping
$routes->group('movie', static function ($routes) {
    $routes->get('', 'Movies::index', ['as' => 'movie']);
    $routes->get('parser', [Movies::class, 'getAllWithParser']);
    $routes->get('table', [Movies::class, 'showTable']);
    $routes->get('create', 'Movies::create');
    $routes->post('', 'Movies::add');
    $routes->get('ex', [Movies::class, 'exception']);
    $routes->get('custom-response', [Movies::class, 'customResponse']);
    $routes->get('redirect', [Movies::class, 'redirect']);
    $routes->get('(:segment)', [Movies::class, 'show']);
    $routes->post('(:num)', [Movies::class, 'update']);
    $routes->get('(:segment)/(:num)', [Movies::class, 'show']);
});

$routes->addRedirect('/film', '/movie'); // Note: Bergantung dengan app.BaseUrl pada .env
// $routes->addRedirect('/film', 'movie'); // Note: Bergantung dengan app.BaseUrl pada .env dan pastikan tidak ada routes dengan placeholder pada level yang sama

$routes->get('/pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

$routes->get('/(:num)/(:alpha)/(:segment)', [Home::class, 'withParam']);
// $routes->get('/(:num)/(:alpha)/(:segment)','Home::withParam'); //Tidak rekomendasi
