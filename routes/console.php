<?php

use Illuminate\Foundation\Inspiring; // Quote provider.
use Illuminate\Support\Facades\Artisan; // Artisan facade.

Artisan::command('inspire', function () { // Register command.
    $this->comment(Inspiring::quote()); // Display quote.
})->purpose('Display an inspiring quote'); // Set description.
