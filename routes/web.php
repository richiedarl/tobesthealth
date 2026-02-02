<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminOfferController;
use App\Http\Controllers\AdminStaffController;
use App\Http\Controllers\AdminApplicationController;
use App\Http\Controllers\AdminContactController;

use App\Http\Controllers\UserOfferController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [
   IndexController::class, 'index' 
])->name('index');

/**
 * Public job offers (users / candidates)
 */
Route::get('/jobs', [UserOfferController::class, 'index'])
    ->name('user.jobs.index');

Route::get('/jobs/{offer}', [UserOfferController::class, 'show'])
    ->name('jobs.show');

Route::get('/jobs/{offer}/apply', [ApplicationController::class, 'create'])
    ->name('applications.create');

    Route::post('/jobs/{offer}/submit', [ApplicationController::class, 'submit_apply'])
    ->name('applications.store');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::post('/login-validate', [LoginController::class, 'loginValidate'])
    ->name('login_validate');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

/*
|--------------------------------------------------------------------------
| Admin – Job Offers (NO resource, NO group)
|--------------------------------------------------------------------------
*/

Route::get('offers/view/all', [AdminOfferController::class, 'index'])
    ->middleware('auth')
    ->name('admin.offers.index');

Route::get('offers/create', [AdminOfferController::class, 'create'])
    ->middleware('auth')
    ->name('admin.offer.create');

Route::post('offers', [AdminOfferController::class, 'store'])
    ->middleware('auth')
    ->name('admin.offers.store');

Route::get('offers/{offer}', [AdminOfferController::class, 'show'])
    ->middleware('auth')
    ->name('admin.offer.show');

Route::get('offers/{offer}/edit', [AdminOfferController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.offer.edit');

Route::put('offers/{offer}', [AdminOfferController::class, 'update'])
    ->middleware('auth')
    ->name('admin.offer.update');

Route::delete('offers/{offer}', [AdminOfferController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.offer.destroy');

/*
|--------------------------------------------------------------------------
| Admin – Staff
|--------------------------------------------------------------------------
*/

Route::get('staff', [AdminStaffController::class, 'index'])
    ->middleware('auth')
    ->name('admin.staff.index');

Route::get('staff/create', [AdminStaffController::class, 'create'])
    ->middleware('auth')
    ->name('admin.staff.create');

Route::post('staff', [AdminStaffController::class, 'store'])
    ->middleware('auth')
    ->name('admin.staff.store');

Route::get('staff/{staff}', [AdminStaffController::class, 'show'])
    ->middleware('auth')
    ->name('admin.staff.show');

Route::get('staff/{staff}/edit', [AdminStaffController::class, 'edit'])
    ->middleware('auth')
    ->name('admin.staff.edit');

Route::put('staff/{staff}', [AdminStaffController::class, 'update'])
    ->middleware('auth')
    ->name('admin.staff.update');

Route::delete('staff/{staff}', [AdminStaffController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.staff.destroy');

/*
|--------------------------------------------------------------------------
| Admin – Applications
|--------------------------------------------------------------------------
*/

Route::get('applications', [AdminApplicationController::class, 'index'])
    ->middleware('auth')
    ->name('admin.applications.index');

Route::patch('applications/{application}/approve', [AdminApplicationController::class, 'approve'])
    ->middleware('auth')
    ->name('admin.applications.approve');

/*
|--------------------------------------------------------------------------
| Admin – Contacts
|--------------------------------------------------------------------------
*/

Route::get('contacts', [AdminContactController::class, 'index'])
    ->middleware('auth')
    ->name('admin.contacts.index');

Route::get('contacts/{contact}', [AdminContactController::class, 'show'])
    ->middleware('auth')
    ->name('admin.contacts.show');
    
