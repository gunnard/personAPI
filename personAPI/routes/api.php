<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */
Route::get('/people', 'PersonController@index')->name('people.all');

Route::post('/people/person', 'PersonController@store')->name('people.store');

Route::get('/people/{person}', 'PersonController@show')->name('people.show');

Route::put('/people/{person}', 'PersonController@update')->name('people.update');

Route::delete('/people/{person}', 'PersonController@destory')->name('people.destroy');
