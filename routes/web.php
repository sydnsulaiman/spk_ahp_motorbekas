<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProdukController,
    ShowroomController,
    LoginController,
    KriteriaController,
    SubkriteriaController,
    HomeController,
    PerhitunganController
};
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



Route::get('/test', function () {
    return view('testview');
});



Route::middleware(['auth:showroom,web'])->group(function () {
    Route::resource('showroom', ShowroomController::class);
    Route::get('profile-showroom', [ShowroomController::class,'indexProfileShowroom'])->name('index.profile.showroom');
    // Route::get('showroom/profile',[ShowroomController::class, 'indexProfileShowroom'])->name('index.profile.showroom');
    
    Route::resource('produk', ProdukController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('subkriteria', SubkriteriaController::class);
    Route::resource('perhitungan', PerhitunganController::class);
    Route::get('perhitungan/{id}/detail', [PerhitunganController::class, 'indexDetail'])->name('perhitungan.detail');

});



Route::get('/', [HomeController::class, 'index'])->name('home.index');
//ROUTE ALGORITMA
Route::post('post/data_kriteria', [HomeController::class, 'postBobot'])->name('home.post.bobot');

Route::get('detail_produk/{id}', [HomeController::class, 'detailProduk'])->name('home.detail_produk');
Route::get('all_produk/{idShowroom?}', [HomeController::class, 'allProduk'])->name('home.allProduk');
Route::get('all_showroom/', [HomeController::class, 'allShowroom'])->name('home.allShowroom');
Route::get('detail_showroom/{id}', [HomeController::class, 'detailShowroom'])->name('home.detail_showroom');


Route::get('login', [LoginController::class,'index'])->name('login.index');
Route::get('register', [LoginController::class,'register'])->name('register.index');
Route::post('login', [LoginController::class,'postShowroom'])->name('login.post');
Route::post('register', [LoginController::class,'storeRegisterShowroom'])->name('register.post');
Route::get('logout', [LoginController::class,'logout'])->name('logout');

