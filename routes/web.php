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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/subjects','SubjectController');
Route::resource('/deped','DepEdController');
Route::resource('/tesda','TESDAController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout','Auth\LoginController@userlogout')->name('user.logout');

Route::prefix('admin')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
	Route::resource('/faculty','FacultyController');
	Route::resource('/registration','RegistrationController');
	Route::resource('/facultysubject','FacultySubjectController');
	Route::resource('/prof', 'ProfileController');
	Route::resource('/bio', 'BioController');
	Route::resource('/grades', 'GradeController');
	Route::resource('/depedassign', 'DepEdAssignController');
	Route::resource('/depedmanage', 'DepEdManageController');
	Route::resource('tesdaassign', 'TESDAAssignController');
	Route::put('/student/{id}/update', 'RemarkController@update')->name('student.update');
});

Route::prefix('faculty')->group(function(){
	Route::resource('/usersub','UserController');
	Route::resource('/profile','UserProfileController');
	Route::resource('/social', 'SocialController');
	Route::put('/remarks/{id}/update', 'StudentGradeController@update')->name('remarks.update');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('password')->group(function() {
Route::get('/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/reset', 'Auth\ResetPasswordController@reset');
});

Route::resource('/students','StudentController');
Route::get('/print/{id}', 'PrintController@printPreview')->name('print.show');
Route::get('/studentgrade/{id}', 'StudentGradeController@show')->name('studentgrade.show');
Route::get('/facultyprint/{id}', 'FacultyPrintController@print')->name('faculty.print');
Route::post('course', 'CourseController@store')->name('course.store');
Route::delete('course/{id}', 'CourseController@destroy');

Route::get('/getExport', 'ExcelController@getExport')->name('getExport');

