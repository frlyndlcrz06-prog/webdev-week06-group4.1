<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache store that will be used by the
    | framework. This connection is utilized if another isn't explicitly
    | specified when running a cache operation inside the application.
    |
    */

    'default' => env('CACHE_STORE', 'database'), // Default cache store.

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    | Supported drivers: "array", "database", "file", "memcached",
    |                    "redis", "dynamodb", "storage", "octane",
    |                    "session", "failover", "null"
    |
    */

    'stores' => [

        'array' => [
            'driver' => 'array', // Cache driver.
            'serialize' => false, // Disable serialization.
        ],

        'database' => [
            'driver' => 'database', // Cache driver.
            'connection' => env('DB_CACHE_CONNECTION'), // Database connection.
            'table' => env('DB_CACHE_TABLE', 'cache'), // Cache table.
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'), // Lock connection.
            'lock_table' => env('DB_CACHE_LOCK_TABLE'), // Lock table.
        ],

        'file' => [
            'driver' => 'file', // Cache driver.
            'path' => storage_path('framework/cache/data'), // Cache path.
            'lock_path' => storage_path('framework/cache/data'), // Lock path.
        ],

        'storage' => [
            'driver' => 'storage', // Cache driver.
            'disk' => env('CACHE_STORAGE_DISK'), // Storage disk.
            'path' => env('CACHE_STORAGE_PATH', 'framework/cache/data'), // Storage path.
        ],

        'memcached' => [
            'driver' => 'memcached', // Cache driver.
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'), // Persistent connection ID.
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'), // Server host.
                    'port' => env('MEMCACHED_PORT', 11211), // Server port.
                    'weight' => 100, // Server weight.
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis', // Cache driver.
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'), // Redis connection.
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'), // Lock connection.
        ],

        'dynamodb' => [
            'driver' => 'dynamodb', // Cache driver.
            'key' => env('AWS_ACCESS_KEY_ID'), // AWS access key.
            'secret' => env('AWS_SECRET_ACCESS_KEY'), // AWS secret key.
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'), // AWS region.
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'), // Cache table.
            'endpoint' => env('DYNAMODB_ENDPOINT'), // Service endpoint.
        ],

        'octane' => [
            'driver' => 'octane', // Cache driver.
        ],

        'failover' => [
            'driver' => 'failover', // Cache driver.
            'stores' => [
                'database', // Primary store.
                'array', // Backup store.
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing the APC, database, memcached, Redis, and DynamoDB cache
    | stores, there might be other applications using the same cache. For
    | that reason, you may prefix every cache key to avoid collisions.
    |
    */

    'prefix' => env('CACHE_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-cache-'), // Cache key prefix.

    /*
    |--------------------------------------------------------------------------
    | Serializable Classes
    |--------------------------------------------------------------------------
    |
    | This value determines the classes that can be unserialized from cache
    | storage. By default, no PHP classes will be unserialized from your
    | cache to prevent gadget chain attacks if your APP_KEY is leaked.
    |
    */

    'serializable_classes' => false, // Disable class unserialization.

];
