<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\MenueController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Frontend\FrontendCategoryController;
use App\Http\Controllers\Frontend\FrontendMenueController;
use App\Http\Controllers\Frontend\FrontendReservationController;
use App\Http\Controllers\Frontend\FrontendWelcomeController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/',[FrontendWelcomeController::class,'index'])->name('index');
Route::get('categories',[FrontendCategoryController::class,'index'])->name('categories.index');
Route::get('categories/{category}',[FrontendCategoryController::class,'show'])->name('categories.show');
Route::get('menues',[FrontendMenueController::class,'index'])->name('menues.index');
Route::get('reservation/step-one',[FrontendReservationController::class,'stepOne'])->name('reservations.step.one');
Route::post('reservation/store/step-one',[FrontendReservationController::class,'storeStepOne'])->name('reservations.store.step.one');
Route::get('reservation/step-two',[FrontendReservationController::class,'stepTwo'])->name('reservations.step.two');
Route::post('reservation/store/step-two',[FrontendReservationController::class,'storeStepTwo'])->name('reservations.store.step.two');
Route::get('admin/login',[LoginController::class,'loginForm'])->name('admin.login');
Route::post('admin/login',[LoginController::class,'login'])->name('admin.login.save');


Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){
     Route::get('/',[HomeController::class,'index'])->name('index');
     Route::resource('admins',AdminController::class);
      Route::resource('customers',CustomerController::class);
     Route::resource('categories',CategoryController::class);
     Route::resource('menues',MenueController::class);
     Route::resource('tables',TableController::class);
     Route::resource('reservations',ReservationController::class);
     Route::post("logout",[LoginController::class,"logout"])->name("logout");
});
