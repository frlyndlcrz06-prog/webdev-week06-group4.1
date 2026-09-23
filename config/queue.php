<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue supports a variety of backends via a single, unified
    | API, giving you convenient access to each backend using identical
    | syntax for each. The default queue connection is defined below.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'database'), // Default connection.

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection options for every queue backend
    | used by your application. An example configuration is provided for
    | each backend supported by Laravel. You're also free to add more.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis",
    |          "deferred", "background", "failover", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync', // Queue driver.
        ],

        'database' => [
            'driver' => 'database', // Queue driver.
            'connection' => env('DB_QUEUE_CONNECTION'), // Database connection.
            'table' => env('DB_QUEUE_TABLE', 'jobs'), // Jobs table.
            'queue' => env('DB_QUEUE', 'default'), // Queue name.
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90), // Retry delay.
            'after_commit' => false, // Wait for commits.
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd', // Queue driver.
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'), // Server host.
            'queue' => env('BEANSTALKD_QUEUE', 'default'), // Queue name.
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90), // Retry delay.
            'block_for' => 0, // Blocking time.
            'after_commit' => false, // Wait for commits.
        ],

        'sqs' => [
            'driver' => 'sqs', // Queue driver.
            'key' => env('AWS_ACCESS_KEY_ID'), // AWS access key.
            'secret' => env('AWS_SECRET_ACCESS_KEY'), // AWS secret key.
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'), // Queue URL prefix.
            'queue' => env('SQS_QUEUE', 'default'), // Queue name.
            'suffix' => env('SQS_SUFFIX'), // Queue URL suffix.
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'), // AWS region.
            'after_commit' => false, // Wait for commits.
        ],

        'redis' => [
            'driver' => 'redis', // Queue driver.
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'), // Redis connection.
            'queue' => env('REDIS_QUEUE', 'default'), // Queue name.
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90), // Retry delay.
            'block_for' => null, // Blocking time.
            'after_commit' => false, // Wait for commits.
        ],

        'deferred' => [
            'driver' => 'deferred', // Queue driver.
        ],

        'background' => [
            'driver' => 'background', // Queue driver.
        ],

        'failover' => [
            'driver' => 'failover', // Queue driver.
            'connections' => [
                'database', // Primary connection.
                'deferred', // Backup connection.
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Job Batching
    |--------------------------------------------------------------------------
    |
    | The following options configure the database and table that store job
    | batching information. These options can be updated to any database
    | connection and table which has been defined by your application.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'), // Batching database.
        'table' => 'job_batches', // Batching table.
    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control how and where failed jobs are stored. Laravel ships with
    | support for storing failed jobs in a simple file or in a database.
    |
    | Supported drivers: "database-uuids", "dynamodb", "file", "null"
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'), // Failed job driver.
        'database' => env('DB_CONNECTION', 'sqlite'), // Failed job database.
        'table' => 'failed_jobs', // Failed jobs table.
    ],

];
