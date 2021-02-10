<?php

use Illuminate\Support\Facades\Route;
// 下記1行を追記
use App\Http\Controllers\TodoController;

Route::get('/', function () {
  return view('welcome');
});

// 下記1行を追記
Route::resource('todo', TodoController::class);

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';