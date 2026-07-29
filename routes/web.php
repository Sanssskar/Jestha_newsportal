<?php

use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\PaymentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PageController::class,"home"])->name('home');
Route::get('/category/{slug}',[PageController::class,"category"])->name('category');
Route::get('/search',[PageController::class,"search"])->name('search');
Route::get('/contact',[PageController::class,"contact"])->name('contact');
Route::post('/contact/store',[PageController::class,"contact_store"])->name('contact.store');
Route::get('/article/{slug}',[PageController::class,"article"])->name('article');

Route::get('/payment/khalti/callback', [PaymentController::class, 'callback'])->name('khalti.callback');
