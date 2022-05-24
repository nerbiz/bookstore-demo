<?php

use App\Http\Controllers\Api\Public\Bookstore\BookController;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

Route::group(['prefix' => 'v1', 'as' => 'api.v1'], function () {
    Route::get('/', function () {
        return response()->json([
           'success' => true,
           'message' => 'routing works',
           'version' => 'v1',
        ]);
    });
    Route::prefix('/public')->group(function () {
        Orion::resource('books', BookController::class)->only(['index', 'show']);
    });
});
