<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
});

Route::controller(PostsController::class)->group(function () {
    Route::get("posts", "index");
    Route::get("posts/{post:slug}", "show");
});
