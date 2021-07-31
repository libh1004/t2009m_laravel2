<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;

// phai login moi di duoc vao cac trang sau
Route::middleware(["auth","admin"])->group(function(){
    Route::get('/',[WebController::class,"home"]);
    Route::get('/about-us',[WebController::class,"aboutUs"]);


    Route::get("/categories",[CategoryController::class,"all"]);
    Route::get("/categories/new",[CategoryController::class,"form"]);
    Route::post("/categories/save",[CategoryController::class,"save"]);
    Route::get("/categories/edit/{id}",[CategoryController::class,"edit"]);
    Route::post("/categories/update/{id}",[CategoryController::class,"update"]);
    Route::get("/categories/delete/{id}",[CategoryController::class,"delete"]);
    Route::get("/categories/categoriesBrand/{id}",[CategoryController::class,"categoriesBrand"]);

    Route::get("/products",[ProductController::class,"all"]);
    Route::get("/products/new",[ProductController::class,"form"]);
    Route::post("/products/save",[ProductController::class,"save"]);
    Route::get("/products/edit/{id}",[ProductController::class,"edit"]);
    Route::post("/products/update/{id}",[ProductController::class,"update"]);
    Route::get("/products/delete/{id}",[ProductController::class,"delete"]);
    Route::get("/products/productsCate/{id}",[ProductController::class,"productsCate"]);

    Route::get("/brands",[BrandController::class,"all"]);
    Route::get("/brands/new",[BrandController::class,"form"]);
    Route::post("/brands/save",[BrandController::class,"save"]);
    Route::get("/brands/edit/{id}",[BrandController::class,"edit"]);
    Route::post("/brands/update/{id}",[BrandController::class,"update"]);
    Route::get("/brands/delete/{id}",[BrandController::class,"delete"]);


    // Book
//    Route::get("/books",[BookController::class,"list_book"]);
//    Route::get("/books/create-book",[BookController::class,"create_book"]);
//    Route::post("/books/save-book",[BookController::class,"save_book"]);

    // Student
    Route::get("/students",[StudentController::class,"list_student"]);
    Route::get("/students/feedback/{student_id}",[StudentController::class,"feed_back"]);
    Route::post("/students/save-feedback",[StudentController::class,"save_feedback"]);

});

// request -> routing |middleware|-> controller

