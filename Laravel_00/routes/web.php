<?php

use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Welcome Page
|--------------------------------------------------------------------------
*/

// Route::get('/', function () {

//     $usercount = User::count();
//     $activeUsers = User::where('status', 1)->count();
//     $blockedUsers = User::where('status', 0)->count();
//     $adminCount = User::where('role', 'admin')->count();

//     return view('welcome', compact(
//         'usercount',
//         'activeUsers',
//         'blockedUsers',
//         'adminCount'
//     ));

// })->name('welcome');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware('CheckAuth')->group(function () {


    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');

    Route::get('/user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');

    Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');

    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');

    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');

    Route::put('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

});