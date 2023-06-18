<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SalesController;

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
    return view('login');
});

Route::get('/register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'loginAuth'])->name('loginAuth');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//Route::post('/create' , [registerUser::class, 'make']);

Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
// Route::get('/dashboard', [LoginController::class, 'logOut'])->name('logOut');

Route::group(['middleware' => 'admin'], function () {
    Route::post('concert', [ConcertController::class, 'store'])->name('concert');
    Route::get('concert', [ConcertController::class, 'create'])->name('concert.create');
});


Route::get('/concert-order/{id}', [SalesController::class, 'create'])->name('concert.buy');
Route::post('/concert-order/{id}', [SalesController::class, 'store'])->name('concert.order.pay');
Route::get('download-pdf/{id}', [SalesController::class, 'downloadPDF'])->name('pdf.download');


