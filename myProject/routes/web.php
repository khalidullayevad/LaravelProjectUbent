<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilleController;
use App\Http\Controllers\DocumentController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/alert',function (){
    return redirect()->route('home')->with('info','Welcome');
});

Route::get('/signup', [AuthController::class, 'getSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'postSignup']);


Route::get('/signin', [AuthController::class, 'getSignIn'])->name('signin');
Route::post('/signin', [AuthController::class, 'postSignIn']);

Route::get('/signout', [AuthController::class, 'getSignOut'])->name('signout');


Route::get('/profile', [ProfilleController::class, 'getProfile'])->name('profile');

Route::post('/editName', [ProfilleController::class, 'postFullNameGenderPhoto']);

Route::post('/editUdastak', [ProfilleController::class, 'postUdastak']);

Route::post('/editSchoolCerteficate', [ProfilleController::class, 'postSchCer']);

Route::post('/editENTCerteficate', [ProfilleController::class, 'postENTCer']);


Route::post('/editOtherDocFiles', [ProfilleController::class, 'postOtherDoc']);

Route::get('/viewUdastak/{id}',[DocumentController::class,'viewUdastak']);

Route::get('/viewOther',[DocumentController::class,'viewOther']);

Route::get('/download/{file}',[DocumentController::class,'download']);


Route::get('/viewSchCer/{id}',[DocumentController::class,'viewScholCer']);

Route::get('/viewEnt/{id}',[DocumentController::class,'viewEnt']);
