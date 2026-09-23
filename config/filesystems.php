<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'), // Default disk.

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local', // Storage driver.
            'root' => storage_path('app/private'), // Storage root.
            'serve' => true, // Serve files.
            'throw' => false, // Suppress exceptions.
            'report' => false, // Suppress reports.
        ],

        'public' => [
            'driver' => 'local', // Storage driver.
            'root' => storage_path('app/public'), // Storage root.
            'url' => rtrim(env('APP_URL', 'http://localhost'), '/').'/storage', // Public URL.
            'visibility' => 'public', // File visibility.
            'throw' => false, // Suppress exceptions.
            'report' => false, // Suppress reports.
        ],

        's3' => [
            'driver' => 's3', // Storage driver.
            'key' => env('AWS_ACCESS_KEY_ID'), // AWS access key.
            'secret' => env('AWS_SECRET_ACCESS_KEY'), // AWS secret key.
            'region' => env('AWS_DEFAULT_REGION'), // AWS region.
            'bucket' => env('AWS_BUCKET'), // S3 bucket.
            'url' => env('AWS_URL'), // Storage URL.
            'endpoint' => env('AWS_ENDPOINT'), // Service endpoint.
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false), // Use path-style URLs.
            'throw' => false, // Suppress exceptions.
            'report' => false, // Suppress reports.
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'), // Public storage link.
    ],

];
