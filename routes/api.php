<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(PostController::class)->group(function () {
    Route::get("/posts", "index");
    Route::get("/posts/{post}", "show");
    Route::post("/posts", "store");
    Route::delete("/posts/{post}", "destroy");
});
