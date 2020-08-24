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

Route::get('/', 'Frontend\HomeController@index')->name('home');

Route::get('home', 'Frontend\HomeController@index')->name('home');

Route::get('health', 'Frontend\HealthController@index')->name('health');

Route::get('supplement', 'Frontend\SupplementController@index')->name('supplement');

Route::get('drug', 'Frontend\DrugController@index')->name('drug');
// ----------
Route::get('/health/diet', 'Frontend\health\DietController@index')->name('health.diet');

Route::get('/health/hobbies', 'Frontend\health\HobbiesController@index')->name('health.hobbies');

Route::get('/health/test', 'Frontend\health\TestController@index')->name('health.test');

Route::get('/supplements/vitamins', 'Frontend\supplements\VitaminsController@index')->name('supplements.vitamins');

Route::get('/supplement/nutritions', 'Frontend\supplements\NutritionsController@index')->name('supplements.nutritions');

Route::get('/drugs/treatments', 'Frontend\drugs\TreatmentsController@index')->name('drugs.treatments');\

Route::get('drugs/drug_introduction', 'Frontend\drugs\DrugIntroductionController@index')->name('drugs.drug_introduction');

Route::get('/admin/login', function (){
    return view('backend.login');
});

Route::post('/admin/login', 'Auth\LoginController@login')->name('login');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {

    Route::get('/admin/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/', 'Backend\WebsiteController@edit')->name('website.edit');
    Route::post('/', 'Backend\WebsiteController@update')->name('website.update');
    
    Route::get('home', 'Backend\HomeController@edit')->name('home.edit');
    Route::post('home', 'Backend\HomeController@update')->name('home.update');

    Route::resource('hobbies', 'Backend\health\HobbiesController', ['except' => ['show']]);
    Route::resource('diet', 'Backend\health\DietController', ['except' => ['show']]);
    Route::resource('test', 'Backend\health\TestController', ['except' => ['show']]);

    Route::resource('drug_introduction', 'Backend\drugs\DrugIntroductionController', ['except' => ['show']]);
    Route::resource('treatments', 'Backend\drugs\TreatmentsController', ['except' => ['show']]);

    Route::resource('vitamins', 'Backend\supplements\VitaminsController', ['except' => ['show']]);
    Route::resource('nutritions', 'Backend\supplements\NutritionsController', ['except' => ['show']]);




});
Auth::routes();

