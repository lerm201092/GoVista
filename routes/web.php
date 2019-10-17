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

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
Route::get('/findAreas', 'Auth\RegisterController@findAreas');
Route::get('/ready', 'RegisterSuccessfulController@index')->name('ready');
$this->get('activation/user/{tokenReset}', 'RegisterSuccessfulController@showActivationForm')->name('activation.user');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{tokenReset}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

// upload image profile
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');

// change password
Route::get('/changePassword','UserController@showChangePasswordForm');
Route::post('/changePassword','UserController@changePassword')->name('changePassword');

// Summary 
Route::get('/summary', 'SummaryController@index');

// Terminos y Condiciones 
Route::get('/termsprivacy', 'TermsController@index')->name('termsprivacy');

// Crinsane Larvel Shopping Cart
Route::get('/productList', 'ProductsController@index')->name('productList');
Route::get('add-to-cart/{id}', 'ProductsController@addToCart');
Route::get('remove-to-cart/{id}', 'ProductsController@removeToCart');
Route::get('update-to-cart/{id}/{qty}', 'ProductsController@updateToCart');
Route::get('/viewcart', 'ViewCartController@index')->name('viewcart');
Route::get('/saveProduct', 'ViewCartController@saveProduct')->name('saveProduct');

// PayU (Response/Confirmation)
Route::get('/payuresponse', 'PayUController@payuResponse')->name('payuresponse');
Route::post('/payuconfirmation', 'PayUController@payuConfirmation')->name('payuconfirmation');

// Detalles De Pagos
Route::get('/detailspayments', 'DetailPaymentController@index')->name('detailspayments');

Route::post('/contacts', 'Modulos\\ContactsController@contactsEmail');
Route::get('/findUserEmpresa', 'Modulos\\User_empresasController@findUserEmpresa');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admon', 'AdmonController@index')->name('admon');

Route::group(['middleware' => ['auth']], function () {
    // Exercise
    Route::get('/findExerciseId', 'Modulos\\ExercisesController@findExerciseId');
    // Areas //
    Route::get('/findAreaTipo', 'Modulos\\AreasController@findAreaTipo');
    Route::get('/findAreaPadre', 'Modulos\\AreasController@findAreaPadre');
    Route::get('/findAreaLike', 'Modulos\\AreasController@findAreaLike');
    Route::resource('modulos/areas', 'Modulos\\AreasController');
});

// Empresas //
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    // Empresas
    Route::resource('modulos/empresas', 'Modulos\\EmpresasController');
    //Centro Medico
    Route::resource('modulos/centrosmedicos', 'Modulos\\CentrosmedicosController');
    // Medicos
    Route::resource('modulos/medicos', 'Modulos\\MedicosController');
    // Entidades Prestadoras de Salud
    Route::resource('modulos/entidades', 'Modulos\\EntidadesController');
    // Usuarios del Sistema
    Route::resource('modulos/users', 'Modulos\\UsersController');
    //Ejercicios
    Route::resource('modulos/exercises', 'Modulos\\ExercisesController');
    // Contactenos
    Route::resource('modulos/contacts', 'Modulos\\ContactsController');
    // User-Empresas
    Route::resource('modulos/user_empresas', 'Modulos\\User_empresasController');
});



Route::group(['middleware' => ['auth', 'checkrole:1,2,3,4']], function () {
    // Historias Clínicas Dashboard
    Route::get('modulos/histories/dashboard/{id}', 'Modulos\\HistoriesController@dashboard');
    // Pacientes
    Route::get('/findPatientsLike', 'Modulos\\PatientsController@findPatientsLike');
    Route::get('/findPatientsId', 'Modulos\\PatientsController@findPatientsId');
    Route::resource('modulos/patients', 'Modulos\\PatientsController');
    // Citas
    Route::resource('modulos/appointments', 'Modulos\\AppointmentsController');
});
Route::group(['middleware' => ['auth', 'checkrole:1,3']], function () {
    // Historias Clínicas
    Route::get('modulos/histories/createfromappointment/{id}', 'Modulos\\HistoriesController@createfromappointment');
    Route::resource('modulos/histories', 'Modulos\\HistoriesController');
});

Route::group(['middleware' => ['cors', 'auth', 'checkrole:1,3,4']], function () {
    // Historias Clínicas Detalle
    Route::get('modulos/history_exercises/playexercise/{id}', 'Modulos\\History_exercisesController@playexercise');
    Route::get('/saveExerciceId', 'Modulos\\History_exercisesController@saveExerciceId');
    Route::post('/saveExercice_Id', 'Modulos\\History_exercisesController@saveExercice_Id');
    Route::resource('modulos/history_exercises', 'Modulos\\History_exercisesController');
    Route::resource('modulos/history_exercises_detail', 'Modulos\\History_exercises_detailController');
});


