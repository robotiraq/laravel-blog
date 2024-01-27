<?php

use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\MenuController;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/menu/create',[MenuController::class,'create']);
Route::post('/menu',[MenuController::class,'store']);
Route::get('/menu',[MenuController::class,'index']);
Route::get('/menu/{id}/items',[MenuController::class,'show']);
Route::get('/menu/{id}/category/create',[FoodCategoryController::class,'create']);
Route::post('/menu/{id}/category',[FoodCategoryController::class,'store']);
Route::get('/foodCategory/{id}/create',[FoodItemController::class,'create']);
Route::post('/foodCategory/{id}',[FoodItemController::class,'store']);