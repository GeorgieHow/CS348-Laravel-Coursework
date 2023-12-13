<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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
    return view('welcome');
});

//Route to Users in database
/*Route::get('/user/{user}', function ($user) {
    return view('user', ['user' => $user]);
});
*/

//Route to user related content
Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}', [UserController::class, 'show'])
    ->name('users.show');

//Route to post related content
Route::get('/posts', [PostController::class,'index']) 
    ->name('posts.index');

Route::get('posts/create', [PostController::class, 'create'])
    ->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('/posts/{id}/destroy', [PostController::class, 'destroy'])
    ->middleware(['can-delete-post'])->name('posts.destroy');

Route::get('posts/{id}/edit', [PostController::class, 'edit'])
    ->middleware(['can-edit-post'])->name('posts.edit');

Route::post('/posts/{id}', [PostController::class, 'update'])
    ->name('posts.update');

//Route to comment related content

Route::get('/comments', [CommentController::class, 'index'])
    ->name('comments.index');

Route::get('posts/{id}/comments/create', [CommentController::class, 'create'])
    ->name('comments.create');

//Might need to change the first /posts back to comments ?? idk
Route::post('/posts/{id}/comments', [CommentController::class, 'store'])
    ->name('comments.store');

Route::get('posts/{id}/comments/{id2}', [CommentController::class, 'show'])
    ->name('comments.show');

Route::get('posts/{id}/comments', [CommentController::class,'destroy'])
    ->name('comments.destroy');

Route::get('posts/{id}/comments/{id2}/edit', [CommentController::class,'edit'])
    ->name('comments.edit');

Route::post('comments/{id}/comments', [CommentController::Class,
    'update'])
    ->name('comments.update');

//Testing
Route::get('/startpage/{name}', function ($name) {
    return view('startpage', ['name' => $name]);
});

Route::get('/test', function () {
    return 'Hello';
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
