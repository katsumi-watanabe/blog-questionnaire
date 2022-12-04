<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/phpinfo', function(){
    echo phpinfo();
});

Route::view('/', 'index')->name('index');
Route::group(['prefix' => 'article'], function() {
    Route::get('/{detail}', [ArticleController::class, 'detail'])->name('article.detail');
    Route::post('/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/{article}/answer', [ArticleController::class, 'answer'])->name('article.answer');
});
// Route::get('/', 'HelloController@index');