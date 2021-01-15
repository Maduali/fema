<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome',);
});

Auth::routes();

Route::get('/admin', [App\HTTP\Controllers\IDPSController::class, 'index'])    
    ->middleware('is_admin')    
    ->name('idps.index');
Route::get('/admin/edit/{id}', [App\HTTP\Controllers\IDPSController::class, 'edit'])    
    ->middleware('is_admin')    
    ->name('admin.edit');
Route::get('/admin/delete/{id}', [App\HTTP\Controllers\IDPSController::class, 'delete'])    
    ->middleware('is_admin')    
    ->name('admin.delete');
 Route::post('admin/post', [App\Http\Controllers\IDPSController::class, 'postEdit'])->name('admin.edit.post');

Route::get('admin/create-step-one', [App\HTTP\Controllers\IDPSController::class, 'createStepOne']) ->middleware('is_admin')->name('idps.create.step.one');
Route::post('admin/create-step-one', [App\HTTP\Controllers\IDPSController::class, 'postCreateStepOne'])->name('idps.create.step.one.post');
  
Route::get('admin/create-step-two', [App\HTTP\Controllers\IDPSController::class, 'createStepTwo']) ->middleware('is_admin')->name('idps.create.step.two');
Route::post('admin/create-step-two', [App\HTTP\Controllers\IDPSController::class, 'postCreateStepTwo'])->name('idps.create.step.two.post');
  
Route::get('admin/create-step-three', [App\HTTP\Controllers\IDPSController::class, 'createStepThree']) ->middleware('is_admin')->name('idps.create.step.three');
Route::post('admin/create-step-three', [App\HTTP\Controllers\IDPSController::class, 'postCreateStepThree'])->name('idps.create.step.three.post');

Route::get('admin/create-step-four', [App\HTTP\Controllers\IDPSController::class, 'createStepFour']) ->middleware('is_admin')->name('idps.create.step.four');
Route::post('admin/create-step-four', [App\HTTP\Controllers\IDPSController::class, 'PostCreateStepFour'])->name('idps.create.step.four.post');

Route::get('admin/create-step-five', [App\HTTP\Controllers\IDPSController::class, 'createStepFive']) ->middleware('is_admin')->name('idps.create.step.five');
Route::post('admin/image-upload', [App\HTTP\Controllers\IDPSController::class, 'imageUploadPost'])->middleware('is_admin')->name('image.upload.post');


Route::get('admin/create-step-six', [App\HTTP\Controllers\IDPSController::class, 'createStepSix']) ->middleware('is_admin')->name('idps.create.step.six');
Route::post('admin/create-step-six', [App\HTTP\Controllers\IDPSController::class, 'PostCreateStepSix'])->name('idps.create.step.six.post');