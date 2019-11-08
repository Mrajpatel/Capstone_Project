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

// Dependencies for the routes
use Illuminate\Support\Facades\Input;
use App\Technologies;
use App\Loanouts;
use App\User;

// Return the welcome view
Route::get('/', function () {
    return view('welcome');
});

// Return the search view for the admin (search tech in database)
Route::any('/searchTech', function () {
    $q = Input::get('q');
    $technologies = Technologies::all();
    return view('tech.searchTech', ['q' => $q, 'technologies' => $technologies]);
});

// Return the search view for the admin (search user in database)
Route::any('/searchUser', function () {
    $q = Input::get('q');
    $users = User::all();
    return view('users.searchUser', ['q' => $q, 'users' => $users]);
});

// Return the tech and redirect user to the show page for user
Route::any('/selectTechUser', function () {
    $q = Input::get('q');
    $technologies = Technologies::all();
    return view('userTech.show', ['q' => $q, 'technologies' => $technologies]);
});

// Route loanout when the user selects the tech to loanout and redirect them to the specific page
Route::any('/loanOut', function () {
    $userId = Auth::id();
    $q = Input::get('q');
    $due_time = date("H:i:s", strtotime('+1 hours'));
    $tech = Loanouts::create([
        'user_id' => $userId,
        'tech_id' => $q,
        'due_time' => $due_time,   
    ]);

    $techUpdate = Technologies::where('id', $q)->update([
        'due_time' => $due_time,
        'loaned' => true,
    ]);

    if ($tech) {
        return redirect()->route('userTech.index', ['tech' => $tech->id])
            ->with('success', 'Tech selected. Please visit Dashboard for return timing.');
    }


    return back()->withInput()->with('errors', 'Error selecting tech');
});

// Routes for the authenticated user
Auth::routes();

// Route the home page to the controller
Route::get('/home', 'HomeController@index')->name('home');

// Route user to loanout controller 
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('admin.logout');

// Route user view to the specific controller to reset the password
Route::get('passwords/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('passwords/email', 'Auth\ResetPasswordController@sendResetLinkEmail');
Route::post('passwords/reset', 'Auth\ResetPasswordController@reset');

// Route admin function to route admin on specific page using AdminLoginController
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

// Set tech folder page routes to TechController
Route::resource('tech', 'TechController');

// Set allTech folder page routes to AllTechUserController
Route::resource('allTech', 'AllTechUserController');

// Set report folder page routes to ReportsController
Route::resource('report', 'ReportsController');

// Set users folder page routes to UserController
Route::resource('users', 'UserController');

// Set userTech folder page routes to TechCoUserTechControllerntroller
Route::resource('userTech', 'UserTechController');

// Set editPersonalInformationc folder page routes to EditUserInformationController
Route::resource('editPersonalInformation', 'EditUserInformationController');
