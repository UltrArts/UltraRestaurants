<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Livewire\{
    RestManage
};

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
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('restaurante', [RestManage::class, 'render'])->name('rest');
    Route::get('restaurante/detalhes/{name}', [RestManage::class, 'details'])->name('rest.details');
});
