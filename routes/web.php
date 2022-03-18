<?php


use App\Models\Product;
use App\Models\Feedback;
use App\Models\Info;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardFeedbackController;
use App\Http\Controllers\InfoController;


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
    return view('landing', [
        'products' => Product::latest()->get()->take(3),
        'feedback' => Feedback::all(),
        'question' =>Info::all()
    ]);
});

Route::get('/product', function () {
    return view('catalog', [
        'products' => Product::latest()->get()
    ]);
});

Route::get('/product/{product:slug}', function (Product $product) {
    return view('catalogDetail', [
        'product' => $product
    ]);
});

Route::get('/back-log', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/back-log', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');
Route::resource('/dashboard/product', DashboardProductController::class)->middleware('auth');
Route::resource('/dashboard/feedback', DashboardFeedbackController::class)->middleware('auth');
Route::resource('/dashboard/faq', InfoController::class)->middleware('auth');
