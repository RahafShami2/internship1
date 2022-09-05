<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminStickerController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCollectionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PublicStickerController;

Route::get('/',[AdminController::class,'index']);

Route::get('/category',[AdminCategoryController::class,'index'])->name('category');
Route::post('/category',[AdminCategoryController::class,'add']);
Route::get('/delete-category/{id}',[AdminCategoryController::class,'delete']);
Route::get('/edit-category/{id}',[AdminCategoryController::class,'edit']);
Route::put('/update-category/{id}',[AdminCategoryController::class,'update'])->name('category.update');

Route::get('/collection',[AdminCollectionController::class,'index'])->name('collection');
Route::post('/collection',[AdminCollectionController::class,'add']);
Route::get('/delete-collection/{id}',[AdminCollectionController::class,'delete']);
Route::get('/edit-collection/{id}',[AdminCollectionController::class,'edit']);
Route::put('/update-collection/{id}',[AdminCollectionController::class,'update'])->name('collection.update');

Route::get('/sticker',[AdminStickerController::class,'index'])->name('sticker');
Route::post('/sticker',[AdminStickerController::class,'add']);
Route::get('/delete-sticker/{id}',[AdminStickerController::class,'delete']);
Route::get('/edit-sticker/{id}',[AdminStickerController::class,'edit']);
Route::put('/update-sticker/{id}',[AdminStickerController::class,'update'])->name('sticker.update');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::post('/login',[LoginController::class,'remember']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');



//Route::get('/',[UserController::class,'index']);
//Route::get('/',[HomeController::class,'index']);
Route::get('/public-sticker',[PublicStickerController::class,'index'])->name('public.sticker');
Route::get('/search',[PublicStickerController::class,'search']);


