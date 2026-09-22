<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $activities = [
        'Freshmen Day',
        'Mobile Legends Tournament',
        'BSIT Alliance Team Building'
    ];

    return view('pages.home', compact('activities'));
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});