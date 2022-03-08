<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/login','UserController@login');
$router->post('/register','UserController@register');
$router->get('/example','ExampleController@index');

/**
 * Company
 */
$router->get('company/','CompanyController@index');
$router->get('company/{kode}/','CompanyController@show');
$router->post('company/','CompanyController@store');
$router->put('company/{kode}/','CompanyController@update');
$router->delete('company/{kode}/','CompanyController@destroy');

/**
 * Transaksi
 */
$router->get('transaksi/','TransaksiController@index');
$router->get('transaksi/{id}/','TransaksiController@show');
$router->post('transaksi/','TransaksiController@store');
$router->put('transaksi/{id}/','TransaksiController@update');
$router->delete('transaksi/{id}/','TransaksiController@destroy');
