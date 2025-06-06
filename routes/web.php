<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;


Route::get('/{page_id}', [CommentController::class, 'showComments'])->name('page.show');


Route::post('/comments/store', [CommentController::class, 'store'])->name('comment.store');

Route::get('/abhin', function () {
    return app()->call('App\Http\Controllers\CommentController@showComments', ['page_id' => 'abhin']);
})->name('abhin.page');

Route::get('/athul', function () {
    return app()->call('App\Http\Controllers\CommentController@showComments', ['page_id' => 'athul']);
})->name('athul.page');
Route::get('/prasobha', function () {
    return app()->call('App\Http\Controllers\CommentController@showComments', ['page_id' => 'prasobha']);
})->name('prasobha.page');
Route::get('/harsha', function () {
    return app()->call('App\Http\Controllers\CommentController@showComments', ['page_id' => 'harsha']);
})->name('harsha.page');



Route::view('/abhin', 'abhin')->name('abhin');
Route::view('/athul', 'athul')->name('athul');
Route::view('/prasobha', 'prasobha')->name('prasobha');
