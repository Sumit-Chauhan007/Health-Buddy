<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BLogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\StatusController;

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

// Route::get('/', function () {
//     return view('frontend.home');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class, 'redirect']);
Route::get('/',[HomeController::class, 'index']);
Route::post('/user-contact',[HomeController::class, 'userContact']);

Route::get('/google', [GoogleController::class, 'redirectGoogle'])->name('googleLogin');
Route::get('/google/callback', [GoogleController::class, 'googleCallback']);
Route::get('/facebook', [FacebookController::class, 'redirectfacebook'])->name('facebookLogin');
Route::get('/facebook/callback', [FacebookController::class, 'facebookCallback']);

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin-dashboard',[HomeController::class, 'adminDashboard']);
    Route::get('/admin-profile',[AdminController::class, 'adminProfile']);
    Route::post('/update-admin-profile',[AdminController::class, 'adminProfileUpdate']);

    Route::get('/users',[UserController::class, 'users']);
    Route::get('/add-user',[UserController::class, 'addUser']);
    Route::post('/add-new-user',[UserController::class, 'addNewUser']);
    Route::get('/deleteUser/{id}',[UserController::class, 'deleteUser']);
    Route::get('/edit-user/{id}',[UserController::class, 'editUser']);
    Route::post('/update-user',[UserController::class, 'updateUser']);
    Route::get('/active-user/{id}', [UserController::class, 'actUser']);
    Route::get('/de-active-user/{id}', [UserController::class, 'deactUser']);
    
    Route::get('/starting',[AdminController::class, 'starting']);
    Route::get('/add-blog',[AdminController::class, 'addBlog']);
    Route::post('/add-new-starting-blog',[AdminController::class, 'addNewStartingBlog']);
    
    Route::get('/first-blog',[BLogController::class, 'firstBlog']);
    Route::get('/add-first-blog',[BLogController::class, 'addFirstBlog']);
    Route::post('/add-new-first-blog',[BLogController::class, 'addNewFirstBlog']);
    
    Route::get('/medical-services-blog',[BLogController::class, 'MedicalBlog']);
    Route::get('/add-medical-blog',[BLogController::class, 'addMedicalBlog']);
    Route::get('/active-medical-blog/{id}',[StatusController::class, 'activeMedicalBlog']);
    Route::get('/de-active-medical-blog/{id}',[StatusController::class, 'deActiveMedicalBlog']);
    Route::post('/add-new-medical-blog',[BLogController::class, 'addNewMedicalBlog']);
    Route::get('/deleteMedicalBlog/{id}',[StatusController::class, 'deleteMedical']);
    Route::get('/edit-medical-service/{id}',[BLogController::class, 'editMedicalService']);
    
    Route::get('/abc-blog',[BLogController::class, 'AbcBlog']);
    Route::get('/add-abc-blog',[BLogController::class, 'addAbcBlog']);
    Route::post('/add-new-abc-blog',[BLogController::class, 'addNewAbcBlog']);
    Route::get('/de-active-abc-blog/{id}',[StatusController::class, 'deActiveAbcBlog']);
    Route::get('/active-abc-blog/{id}',[StatusController::class, 'ActiveAbcBlog']);
    Route::get('/deleteAbcBlog/{id}',[StatusController::class, 'deleteAbc']);
    Route::get('/edit-abc-service/{id}',[BLogController::class, 'editAbcService']);
    
    Route::get('/contact-blog',[BLogController::class, 'ContactBlog']);
    Route::get('/add-contact-blog',[BLogController::class, 'addContactBlog']);
    Route::post('/add-new-contact-blog',[BLogController::class, 'addNewContactBlog']);
    Route::get('/de-active-contact/{id}',[StatusController::class, 'deActiveContactBlog']);
    Route::get('/active-contact/{id}',[StatusController::class, 'ActiveContactBlog']);
    Route::get('/deleteContactBlog/{id}',[StatusController::class, 'deleteContact']);
    Route::get('/edit-contact/{id}',[BLogController::class, 'editContact']);
    
    
    Route::get('/team-blog',[BLogController::class, 'TeamBlog']);
    Route::get('/add-team-blog',[BLogController::class, 'addTeamBlog']);
    Route::post('/add-new-team-blog',[BLogController::class, 'addNewTeamBlog']);
    Route::get('/de-active-team-blog/{id}',[StatusController::class, 'deActiveTeamBlog']);
    Route::get('/active-team-blog/{id}',[StatusController::class, 'ActiveTeamBlog']);
    Route::get('/delete-team-blog/{id}',[StatusController::class, 'deleteTeamBlog']);
    Route::get('/edit-team/{id}',[BLogController::class, 'editTeam']);
    
    Route::get('/testimonial',[BLogController::class, 'Testimonial']);
    Route::get('/add-testimonial',[BLogController::class, 'addTestimonial']);
    Route::post('/add-new-testimonial',[BLogController::class, 'addNewTestimonial']);
    Route::get('/active-testimonial/{id}', [BLogController::class, 'actTest']);
    Route::get('/de-active-testimonial/{id}', [BLogController::class, 'deactTest']);
    Route::get('/deleteTestimonial/{id}',[BLogController::class, 'deleteTest']);
    Route::get('/edit-testimonial/{id}',[BLogController::class, 'editTestimonial']);
    
    Route::get('/user-contact',[AdminController::class, 'ContactedUser']);
    Route::get('/export-detail',[AdminController::class, 'ExportDetail']);
});

Route::get('/user-dashboard',[HomeController::class, 'userDashboard']);


Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');
