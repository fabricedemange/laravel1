<?php

use Illuminate\Support\Facades\Route;

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


use App\Http\Controllers\WelcomeController;
Route::get('/', [WelcomeController::class, 'index'])->name('home');


Route::get('{n}', function($n) {
    return 'Je suis la page ' . $n . ' !';
})->where('n', '[1-3]');



Route::get('test', function () {
    return ['un', 'deux', 'trois'];
});


/*
Route::get('article/{n}', function($n) {
    return view('article')->withNumero($n);
})->where('n', '[0-9]+');
REMPLACEE PAR L'APPEL CONTROLEUR CI DESSOUS*/
use App\Http\Controllers\ArticleController;
Route::get('article/{n}', [ArticleController::class, 'show'])->where('n', '[0-9]+');



Route::get('/facture/{n}', function($n) {
    return view('facture')->withNumero($n);
})->where('n', '[0-9]+');


/*formulaire avec contrôle*/
use App\Http\Controllers\UsersController;
Route::get('users', [UsersController::class, 'create']);
//Route::get('users', "UsersController@create");
Route::post('users', [UsersController::class, 'store']);

use App\Http\Controllers\ContactController;
Route::get('contact', [ContactController::class, 'create']);
Route::post('contact', [ContactController::class, 'store']);

Route::get('/test-contact', function () {
    return new App\Mail\Contact([
      'nom' => 'Durand',
      'email' => 'durand@chezlui.com',
      'message' => 'Je voulais vous dire que votre site est magnifique !'
      ]);
});

use App\Http\Controllers\PhotoController;

Route::get('photo', [PhotoController::class, 'create']);
Route::post('photo', [PhotoController::class, 'store']);
//FDE