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

use App\Http\Controllers\TechController;
use Illuminate\Support\Facades\Input;
use App\Technologies;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::any('/searchTech', function(){
    $q = Input::get('q');
    $technologies = Technologies::all();
    return view('tech.searchTech', ['q' => $q, 'technologies' => $technologies]);
    
});

Route::any('/searchUser', function(){
    $q = Input::get('q');
    $users = User::all();
    return view('users.searchUser', ['q' => $q, 'users' => $users]);
    
});

Route::any('/searchTechByUser', function(){
    $q = Input::get('q');
    $technologies = Technologies::all();
    return view('userTech.searchTechByUser', ['q' => $q, 'technologies' => $technologies]);
    
});

// Route::any('/selectTech', function(){
//     $q = Input::get('q');
//     $technologies = Technologies::all();
//     return view('userTech.searchTechByUser', ['q' => $q, 'technologies' => $technologies]);
    
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('admin.logout');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    
    // Password RESET
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@sendLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    
});
Route::resource('tech', 'TechController');

Route::resource('loanedTech', 'LoanedTechController');
Route::resource('users', 'UserController');
Route::resource('userTech', 'UserTechController');
Route::resource('editPersonalInformation', 'EditUserInformationController');
