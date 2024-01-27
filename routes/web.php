<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemsController;

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

Route::get('/', [ItemsController::class, 'ShowItemGroup'])->name('welcome');

// --> Admin View
Route::get('/cpanel', [DashboardController::class, 'DisplayItems'])->name('controlpanel')->middleware('auth');

Route::get('/addgitem', [DashboardController::class, 'Displayadditemsgroup'])->name('addgitem');
Route::POST('/savegritem', [DashboardController::class, 'SaveGrItem'])->name('savegritem');

Route::get('/del/{x}', [DashboardController::class, 'Del'])->name('del');
Route::POST('/update', [DashboardController::class, 'Update'])->name("update");
Route::get('/edit/{x}', [DashboardController::class, 'Edit'])->name('edit');


Route::get('/additem', [DashboardController::class, 'Displayitem'])->name('additem');
Route::POST('/saveitem', [DashboardController::class, 'SaveItem'])->name('saveitem');

Route::get('/del/item/{x}', [DashboardController::class, 'DelItem'])->name('del-item');
Route::POST('/update/item', [DashboardController::class, 'UpdateItem'])->name("update-item");
Route::get('/edit/item/{x}', [DashboardController::class, 'EditItem'])->name('edit-item');

Route::get('/bills', [DashboardController::class, 'Bills'])->name('bills');


Route::get('/logout', [DashboardController::class, 'Logout'])->name('logout');

// --> User View
Route::get('/itemgroup', [ItemsController::class, 'GetItemGroup'])->name('itemgroup');
Route::get('/item', [ItemsController::class, 'GetItems'])->name('item');
Route::get('/addtocartitem/{id}', [ItemsController::class, 'Addtocartitem'])->name('addtocartitem');


Route::get('/showproduct/{id}', [ItemsController::class, 'Showproduct'])->name('showproduct');

Route::get('/addtocart/{id}', [ItemsController::class, 'Addtocart'])->name('addtocart');
Route::get('/deleteitem/{id}', [ItemsController::class, 'Deleteitem'])->name('deleteitem');

Route::get('/checkout', [ItemsController::class, 'Checkout'])->name('checkout')->middleware('auth');
Route::get('/payment', [ItemsController::class, 'Payment'])->name('payment')->middleware('auth');
Route::get('/main', [ItemsController::class, 'Empty'])->name('empty')->middleware('auth');


Route::get('/logout', [ItemsController::class, 'Logout'])->name('logout');

Route::get('/testapi', [ItemsController::class, 'testapi'])->name('testapi');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
