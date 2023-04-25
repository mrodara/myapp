<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Permission\Roles;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    //PERMISSIONS AND ROLES
    Route::prefix('/acl')->group(function () {
        Route::get('roles', Roles::class)->name('roles.index');
    });
    //END PERMISSIONS AND ROLES
});
