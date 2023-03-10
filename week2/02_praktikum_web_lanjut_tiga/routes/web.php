<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
    echo 'Home';
});

Route::get('/about-us', function () {
    echo 'About us';
});

Route::get('/category', function () {
    echo 'Category';
});
Route::prefix('category')->group(function () {
    Route::get('/marbel-edu-games', function () { echo 'Marbel Edu Game';});
    Route::get('/marbel-and-friends-kids-game', function () {echo 'Marbel and Friends kids game';});
    Route::get('/riri-story-books', function () {echo 'Riri Story Books';});
    Route::get('/kolak-kids-songs', function () {echo 'Kolak Kids Songs';});
});

Route::get('/program', function () {
    echo 'Program';
});
Route::prefix('program')->group(function () {
    Route::get('/karir', function () {echo 'Karir';});
    Route::get('/magang', function () {echo 'Magang';});
    Route::get('/kunjungan-industri', function () {echo 'Kunjungan Industri';});
});

Route::get('/news', function () {echo 'News';});
Route::get('/news/{newstitle}', function ($newstitle) {
    echo 'News ' +$newstitle;
});

Route::get('/contact-us', [ContactController::class, 'index']);
Route::post('/contact-us', [ContactController::class, 'store']);