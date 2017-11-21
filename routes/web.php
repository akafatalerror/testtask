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
//
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');
Route::get('/home/vk', 'HomeController@vk')->name('login');
Route::get('/logout', 'HomeController@logout')->name('logout');

Route::get('/social_login/{provider}', 'SocialController@login');
Route::get('/social_login/callback/{provider}', 'SocialController@callback');

//
Route::group(array('middleware' => 'auth'), function()
{
    Route::get('/cabinet', 'CabinetController@index');
    Route::get('/cabinet/{cabinet_id}/{cabinet_name}', 'CabinetController@cabinet');
    Route::get('/campaign/{cabinet_id}/{cabinet_name}/{campaign_id}/{campaign_name}', 'CabinetController@campaign');
    Route::post('/campaign/delete', 'CabinetController@delete');
    Route::post('/campaign/comment', 'CabinetController@comment');
});
