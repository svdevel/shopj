<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CommandeController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\PanierController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PaiementController;


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
//     return view('frontend.index');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('categories-u', [FrontendController::class, 'categories']);
Route::get('view-categorie/{slug}', [FrontendController::class, 'viewcategorie']);
Route::get('view-article/{categorie_slug}/{article_slug}', [FrontendController::class, 'viewarticle']);

Route::post('add-to-panier', [PanierController::class, 'addArticle']);
Route::post('delete-panier-item', [PanierController::class, 'deletearticle']);
Route::post('update-panier', [PanierController::class, 'updatepanier']);

Route::middleware(['auth'])->group(function () {
    Route::get('panier', [PanierController::class, 'viewpanier']);
    Route::get('paiement', [PaiementController::class, 'index']);
    Route::post('passer-commande', [PaiementController::class, 'passercommande']);

    Route::get('mes-commandes', [UserController::class, 'index']);
    Route::get('details-commande/{id}', [UserController::class, 'detailscommande']);

});

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','roleAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('categories/', [CategorieController::class, 'index']);
    Route::get('add-categorie', [CategorieController::class, 'add']);
    Route::post('insert-categorie', [CategorieController::class, 'insert']);
    Route::get('edit-categorie/{id}', [CategorieController::class, 'edit']);
    Route::put('update-categorie/{id}', [CategorieController::class, 'update']);
    Route::get('delete-categorie/{id}', [CategorieController::class, 'destroy']);

    Route::get('articles/', [ArticleController::class, 'index']);
    Route::get('add-article/', [ArticleController::class, 'add']);
    Route::post('insert-article/', [ArticleController::class, 'insert']);
    Route::get('edit-article/{id}', [ArticleController::class, 'edit']);
    Route::put('update-article/{id}', [ArticleController::class, 'update']);
    Route::get('delete-article/{id}', [ArticleController::class, 'destroy']);

    Route::get('commandes', [CommandeController::class, 'index']);
    Route::get('admin/details-commande/{id}', [CommandeController::class, 'detailscommande']);
    Route::put('update-commande/{id}', [CommandeController::class, 'updatecommande']);
    Route::get('commandes-terminees', [CommandeController::class, 'commandesterminees']);
    

});



Route::get('users', [DashboardController::class, 'users']);
