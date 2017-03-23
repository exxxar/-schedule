<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'MainController@index');
Route::get('/i2', 'MainController@index2');
Route::get('/table', 'MainController@table');
Route::get('/table2', 'MainController@table2');

Route::get('/foo/{a?}/{b?}/{p?}', 'MainController@foo');

Route::get('/getSystemDate', 'MainController@systemDate');
Route::get('/getWeek', 'MainController@week');
Route::get('/getRasp/{fuckId?}/{courseId?}/{groupId?}', 'MainController@rasp');
Route::post('/getRasp2', 'MainController@raspPost');
Route::get('/getSubject/{id}', 'MainController@subject');

Route::post('/getGroups', 'MainController@groupsInFack');
Route::get('/getFackList', 'MainController@fackList');
Route::get('/getBellList', 'MainController@bellList');

Route::post('/search', 'MainController@searchFilter');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::post('/facultModify', 'AdminController@facultModify');
    Route::post('/groupModify', 'AdminController@groupModify');
    Route::post('/bellModify', 'AdminController@bellModify');
    Route::post('/raspModify', 'AdminController@raspModify');


    Route::get('/facultDel/{id}', 'AdminController@facultDel');
    Route::get('/groupDel/{id}', 'AdminController@groupDel');
    Route::get('/bellDel/{id}', 'AdminController@bellDel');
    Route::get('/raspDel/{id}', 'AdminController@raspDel');

});
Auth::routes();

Route::get('/home', 'HomeController@index');
