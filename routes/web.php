<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('index');
});

Route::get('/athul', [CommentController::class, 'showComments'])->name('athul.page');
Route::get('/{page_id}', [CommentController::class, 'showComments'])->name('page.show');

Route::post('/comments/store', [CommentController::class, 'store'])->name('comment.store');

Route::get('/abhin', function () {
    return app()->call('App\Http\Controllers\CommentController@showComments', ['page_id' => 'abhin']);
})->name('abhin.page');

