<?php

use App\Http\Controllers\LanguageController;

  

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    
Route::get('/', 'HomeController@home')->name('home');

Route::get('management', 'ManagementController@home')->name('management');

Route::resource('branches', 'BranchController');

Route::resource('leads', 'LeadController');

Route::resource('products', 'ProductController');

Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');

// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);


});

