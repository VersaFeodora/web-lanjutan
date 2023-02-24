<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;

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
    return view('welcome');
});

Route::get('/about-us', function () {
    echo 'about us';
});

Route::prefix('category')->group(function () {
    Route::get('/marbel-edu-games', function () {echo 'marbel-edu-games';});
    Route::get('/marbel-and-friends-kids-game', function () {echo 'marbel-and-friends-kids-game';});
    Route::get('/riri-story-books', function () {echo 'riri-story-books';});
    Route::get('/kolak-kids-songs', function () {echo 'kolak-kids-songs';});
});

Route::prefix('program')->group(function () {
    Route::get('/karir', function () {echo 'karir';});
    Route::get('/magang', function () {echo 'magang';});
    Route::get('/kunjungan-industri', function () {echo 'kunjungan-industri';});
});

Route::get('/news/{newstitle}', function ($newstitle) {
    echo $newstitle;
});

Route::get('/contact-us', function () {});