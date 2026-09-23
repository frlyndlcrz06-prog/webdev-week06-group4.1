<?php

use Illuminate\Support\Str;
use Pdo\Mysql;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'), // Default connection.

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite', // Database driver.
            'url' => env('DB_URL'), // Optional database URL.
            'database' => env('DB_DATABASE', database_path('database.sqlite')), // Database file.
            'prefix' => '', // Table prefix.
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true), // Enforce foreign keys.
            'busy_timeout' => null, // Lock wait time.
            'journal_mode' => null, // SQLite journal mode.
            'synchronous' => null, // SQLite sync mode.
            'transaction_mode' => 'DEFERRED', // Transaction mode.
        ],

        'mysql' => [
            'driver' => 'mysql', // Database driver.
            'url' => env('DB_URL'), // Optional database URL.
            'host' => env('DB_HOST', '127.0.0.1'), // Database host.
            'port' => env('DB_PORT', '3306'), // Database port.
            'database' => env('DB_DATABASE', 'laravel'), // Database name.
            'username' => env('DB_USERNAME', 'root'), // Database user.
            'password' => env('DB_PASSWORD', ''), // Database password.
            'unix_socket' => env('DB_SOCKET', ''), // Unix socket path.
            'charset' => env('DB_CHARSET', 'utf8mb4'), // Character set.
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'), // Text collation.
            'prefix' => '', // Table prefix.
            'prefix_indexes' => true, // Prefix index names.
            'strict' => true, // Enable strict mode.
            'engine' => null, // Storage engine.
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                Mysql::ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb' => [
            'driver' => 'mariadb', // Database driver.
            'url' => env('DB_URL'), // Optional database URL.
            'host' => env('DB_HOST', '127.0.0.1'), // Database host.
            'port' => env('DB_PORT', '3306'), // Database port.
            'database' => env('DB_DATABASE', 'laravel'), // Database name.
            'username' => env('DB_USERNAME', 'root'), // Database user.
            'password' => env('DB_PASSWORD', ''), // Database password.
            'unix_socket' => env('DB_SOCKET', ''), // Unix socket path.
            'charset' => env('DB_CHARSET', 'utf8mb4'), // Character set.
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'), // Text collation.
            'prefix' => '', // Table prefix.
            'prefix_indexes' => true, // Prefix index names.
            'strict' => true, // Enable strict mode.
            'engine' => null, // Storage engine.
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                Mysql::ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql', // Database driver.
            'url' => env('DB_URL'), // Optional database URL.
            'host' => env('DB_HOST', '127.0.0.1'), // Database host.
            'port' => env('DB_PORT', '5432'), // Database port.
            'database' => env('DB_DATABASE', 'laravel'), // Database name.
            'username' => env('DB_USERNAME', 'root'), // Database user.
            'password' => env('DB_PASSWORD', ''), // Database password.
            'charset' => env('DB_CHARSET', 'utf8'), // Character set.
            'prefix' => '', // Table prefix.
            'prefix_indexes' => true, // Prefix index names.
            'search_path' => 'public', // Schema search path.
            'sslmode' => env('DB_SSLMODE', 'prefer'), // SSL mode.
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv', // Database driver.
            'url' => env('DB_URL'), // Optional database URL.
            'host' => env('DB_HOST', 'localhost'), // Database host.
            'port' => env('DB_PORT', '1433'), // Database port.
            'database' => env('DB_DATABASE', 'laravel'), // Database name.
            'username' => env('DB_USERNAME', 'root'), // Database user.
            'password' => env('DB_PASSWORD', ''), // Database password.
            'charset' => env('DB_CHARSET', 'utf8'), // Character set.
            'prefix' => '', // Table prefix.
            'prefix_indexes' => true, // Prefix index names.
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations', // Migration tracking table.
        'update_date_on_publish' => true, // Update published dates.
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'), // Redis client.

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'), // Cluster mode.
            'prefix' => env('REDIS_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-database-'), // Key prefix.
            'persistent' => env('REDIS_PERSISTENT', false), // Keep connections open.
        ],

        'default' => [
            'url' => env('REDIS_URL'), // Optional Redis URL.
            'host' => env('REDIS_HOST', '127.0.0.1'), // Redis host.
            'username' => env('REDIS_USERNAME'), // Redis user.
            'password' => env('REDIS_PASSWORD'), // Redis password.
            'port' => env('REDIS_PORT', '6379'), // Redis port.
            'database' => env('REDIS_DB', '0'), // Redis database number.
            'max_retries' => env('REDIS_MAX_RETRIES', 3), // Connection retries.
            'backoff_algorithm' => env('REDIS_BACKOFF_ALGORITHM', 'decorrelated_jitter'), // Retry strategy.
            'backoff_base' => env('REDIS_BACKOFF_BASE', 100), // Retry delay start.
            'backoff_cap' => env('REDIS_BACKOFF_CAP', 1000), // Retry delay limit.
        ],

        'cache' => [
            'url' => env('REDIS_URL'), // Optional Redis URL.
            'host' => env('REDIS_HOST', '127.0.0.1'), // Redis host.
            'username' => env('REDIS_USERNAME'), // Redis user.
            'password' => env('REDIS_PASSWORD'), // Redis password.
            'port' => env('REDIS_PORT', '6379'), // Redis port.
            'database' => env('REDIS_CACHE_DB', '1'), // Cache database number.
            'max_retries' => env('REDIS_MAX_RETRIES', 3), // Connection retries.
            'backoff_algorithm' => env('REDIS_BACKOFF_ALGORITHM', 'decorrelated_jitter'), // Retry strategy.
            'backoff_base' => env('REDIS_BACKOFF_BASE', 100), // Retry delay start.
            'backoff_cap' => env('REDIS_BACKOFF_CAP', 1000), // Retry delay limit.
        ],

    ],

];
