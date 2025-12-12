<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
})->name('home');

Route::get('/memories', function () {
    return view('memories.memories');
})->name('memories');

Route::get('/gallery', function () {
    return view('gallery.gallery');
})->name('gallery');