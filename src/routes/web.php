<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

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
// TodoController
// /にアクセスしたらindexアクション呼び出し
Route::get('/', [TodoController::class, 'index']);
// /todosにアクセスしたらstoreアクション呼び出し
Route::post('/todos', [TodoController::class, 'store']);
// /todos/updateにアクセスしたらupdateアクション呼び出し
// Route::post('/todos/update', [TodoController::class, 'update']);
Route::patch('/todos/update', [TodoController::class, 'update']);
// /todos/deleteにアクセスしたらdestroyアクション呼び出し
Route::delete('/todos/delete', [TodoController::class, 'destroy']);

// /todos/createにアクセスしたらstoreアクション呼び出し
Route::post('/todos/create', [TodoController::class, 'store']);
// /todos/searchにアクセスしたらsearchアクション呼び出し
Route::get('/todos/search', [TodoController::class, 'search']);

// CategoryController
// /categoryにアクセスしたらindexアクション呼び出し
Route::get('/categories', [CategoryController::class, 'index']);
// 追加機能
// /categoryにアクセスしたらstoreアクション呼び出し
Route::post('/categories', [CategoryController::class, 'store']);

// Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');

// /categories/updateにアクセスしたらupdateアクション呼び出し
Route::patch('/categories/update', [CategoryController::class, 'update']);
// /categories/deleteにアクセスしたらdestroyアクション呼び出し
Route::delete('/categories/delete', [CategoryController::class, 'destroy']);




