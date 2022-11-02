<?php


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

/*Route::get('/', function () {
    return view('welcome');
})->middleware('auth');;*/



Route::get('/', [
    'uses' => 'dashboardController@index',
    'as'=>'dashboard.index']);
/*->middleware('auth');*/

Auth::routes();

Route::resource('categories',categorieController::class)->middleware('auth');
Route::resource('suppliers',supplierController::class)->middleware('auth');
Route::resource('products',productController::class)->middleware('auth');
Route::resource('customers',CustomerController::class)->middleware('auth');
Route::resource('transactions',TransactionController::class)->middleware('auth');




