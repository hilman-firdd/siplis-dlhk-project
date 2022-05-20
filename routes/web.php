<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Superadmin\AgendaController;
use App\Http\Controllers\Superadmin\KArtikelController;
use App\Http\Controllers\Superadmin\ArtikelController;
use App\Http\Controllers\Superadmin\DashboardController;
use App\Http\Controllers\Superadmin\DataHipalController;
use App\Http\Controllers\Superadmin\DataKipalController;
use App\Http\Controllers\Superadmin\GaleriController;
use App\Http\Controllers\Superadmin\GrafikController;
use App\Http\Controllers\Superadmin\GrafikJenisController;
use App\Http\Controllers\Superadmin\GrafikKategoriController;
use App\Http\Controllers\Superadmin\PeraturanController;
use App\Http\Controllers\Superadmin\ProfilTPKController;
use App\Http\Controllers\Superadmin\SaranKeluhanController;
use App\Http\Controllers\User\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

// AUTH

Route::get('login', [LoginController::class,'login'])->name('login');
Route::post('post-login', [LoginController::class,'postlogin'])->name('postlogin');
Route::post('logout', [LoginController::class,'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    Route::resource('dashboard', DashboardController::class);
        
});

Route::middleware('auth')->group(function () {

// PROFIL TPK
Route::resource('/profiltpk', ProfilTPKController::class);
Route::get('/profiltpk-datable',[ProfilTPKController::class,'dataTable'] );



// ARTIKEL
Route::resource('/artikel', ArtikelController::class);
Route::get('/data-artikel', [ArtikelController::class,'dataArtikel']);
Route::get('/tambah-artikel', [ArtikelController::class,'tambahArtikel'])->name('tambah.artikel');




Route::resource('/kartikel', KArtikelController::class);

// DATA HARIAN IPAL
Route::resource('/dataharian', DataHipalController::class);
Route::get('/data-dhipal', [DataHipalController::class,'dataDhipal']);




Route::resource('/datakondisi', DataKipalController::class);


// GRAFIK
Route::resource('/grafik', GrafikController::class);
Route::resource('/grafik-kategori', GrafikKategoriController::class);
Route::resource('/grafik-jenis', GrafikJenisController::class);

// GALERI
Route::resource('/galeri', GaleriController::class);
Route::get('/data-galeri', [GaleriController::class,'dataGaleri']);


//  SARAN & KELUHAN
Route::resource('/sarankeluhan', SaranKeluhanController::class);
Route::get('/saran-keluhan', [SaranKeluhanController::class,'DataSaranKeluhan']);


// AGENDA
Route::resource('/agenda', AgendaController::class);
Route::get('/data-agenda', [AgendaController::class,'DataAgenda']);


// PERATURAN
Route::resource('/peraturan', PeraturanController::class);
Route::get('/data-peraturan', [PeraturanController::class,'DataPeraturan']);




});

// USER
Route::resource('home', HomeController::class);