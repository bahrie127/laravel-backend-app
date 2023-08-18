<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login', ['type_menu' => '']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => '']);
    })->name('home')->middleware('can:dashboard');
    Route::get('profile-edit', function () {
        return view('pages.profile', ['type_menu' => '']);
    })->name('profile.edit');

    Route::resource('user', UserController::class);
});


// Route::get('/login', function () {
//     // return view('welcome');
//     return view('auth.login');
// });

// Route::get('/register', function () {
//     return view('auth.register');
// });

// Route::get('/reset', function () {
//     return view('auth.reset');
// });

// Route::get('/forgot', function () {
//     return view('auth.forgot');
// });

// Route::get('/verify', function () {
//     return view('auth.verify');
// });
