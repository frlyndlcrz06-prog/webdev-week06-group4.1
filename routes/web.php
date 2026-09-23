<?php

use Illuminate\Support\Facades\Route; // Route facade.

Route::get('/', function () { // Home route.

    $activities = [
        'Freshmen Day', // Activity one.
        'Mobile Legends Tournament', // Activity two.
        'BSIT Alliance Team Building' // Activity three.
    ];

    return view('pages.home', compact('activities')); // Show home page.
});

Route::get('/about', function () { // About route.
    return view('pages.about'); // Show about page.
});

Route::get('/contact', function () { // Contact route.
    return view('pages.contact'); // Show contact page.
});
