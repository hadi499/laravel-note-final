<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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
    return view('home', [
        'active' => ''
    ]);
});

Route::get('/notes/checkSlug', [NoteController::class, 'checkSlug']);

Route::get('/notes', [NoteController::class, 'index'])->middleware('auth');
Route::get('/notes/create', [NoteController::class, 'create'])->middleware('auth');
Route::post('/notes/create', [NoteController::class, 'store'])->middleware('auth');
Route::get('/notes/edit/{note:slug}', [NoteController::class, 'edit'])->middleware('auth');
Route::post('/notes/edit/{note:slug}', [NoteController::class, 'update'])->middleware('auth');
Route::get('/notes/{note:slug}', [NoteController::class, 'show'])->middleware('auth');
Route::post('/notes/upload', [NoteController::class, 'uploadImage'])->name('ckeditor.upload')->middleware('auth');
Route::delete('/notes/delete/{note:slug}', [NoteController::class, 'destroy'])->middleware('auth');

Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'registerStore']);

// default redirect login setting di app/Providers/RouteServiceProvider
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');;
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category/create', [CategoryController::class, 'store']);
Route::get('/category/{slug}', [CategoryController::class, 'getCategoryBySlug']);

Route::get('/galery', [ImageController::class, 'media']);
Route::delete('/delete-file/{fileId}', [ImageController::class, 'deleteFile'])->name('delete.file');

// Route::get('/categories', function () {
//     return view('categories', [
//         'categories' => Category::all(),
//         'active' => ''
//     ]);
// });
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('category', [
//         'notes' => $category->notes,
//         'active' => ''
//     ]);
// });
// Route::get('/category/{category:slug}', function (Category $category) {
//     return view('category', [
//         'notes' => $category->notes,
//         'category' => $category,
//         'active' => ''
//     ]);
// })->middleware('auth');
