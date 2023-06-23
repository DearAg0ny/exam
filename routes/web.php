<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpensesController;
use App\Models\Expenses;

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
    $expenses = Expenses::all();
    return view('home', ['expenses'=>$expenses]);
});
//auth routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
//expenses routes
Route::post('/create-expense', [ExpensesController::class, 'createExpense']);
Route::get('/edit-expense/{expenses}', [ExpensesController::class, 'editExpense']);
Route::put('/edit-expense/{expenses}', [ExpensesController::class, 'updateExpense']);
Route::delete('/delete-expense/{expenses}', [ExpensesController::class, 'deleteExpense']);

