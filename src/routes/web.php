<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

// /にアクセスしたらindexアクション呼び出し
Route::get('/', [TodoController::class, 'index']);
// /todosにアクセスしたらstoreアクション呼び出し
Route::post('/todos', [TodoController::class, 'store']);
// /todos/updateにアクセスしたらupdateアクション呼び出し
Route::post('/todos/update', [TodoController::class, 'update']);
Route::patch('/todos/update', [TodoController::class, 'update']);
// /todos/deleteにアクセスしたらdestroyアクション呼び出し
Route::delete('/todos/delete', [TodoController::class, 'destroy']);



