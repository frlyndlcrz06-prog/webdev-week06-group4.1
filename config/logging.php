<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that is utilized to write
    | messages to your logs. The value provided here should match one of
    | the channels present in the list of "channels" configured below.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'), // Default channel.

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'), // Deprecation channel.
        'trace' => env('LOG_DEPRECATIONS_TRACE', false), // Include traces.
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Laravel
    | utilizes the Monolog PHP logging library, which includes a variety
    | of powerful log handlers and formatters that you're free to use.
    |
    | Available drivers: "single", "daily", "monthly", "slack", "syslog",
    |                    "errorlog", "monolog", "custom", "stack"
    |
    */

    'channels' => [

        'stack' => [
            'driver' => 'stack', // Log driver.
            'channels' => explode(',', (string) env('LOG_STACK', 'single')), // Stacked channels.
            'ignore_exceptions' => false, // Do not ignore errors.
        ],

        'single' => [
            'driver' => 'single', // Log driver.
            'path' => storage_path('logs/laravel.log'), // Log file path.
            'level' => env('LOG_LEVEL', 'debug'), // Minimum level.
            'replace_placeholders' => true, // Replace placeholders.
        ],

        'daily' => [
            'driver' => 'daily', // Log driver.
            'path' => storage_path('logs/laravel.log'), // Log file path.
            'level' => env('LOG_LEVEL', 'debug'), // Minimum level.
            'max_files' => env('LOG_DAILY_DAYS', 14), // Files to keep.
            'replace_placeholders' => true, // Replace placeholders.
        ],

        'monthly' => [
            'driver' => 'monthly', // Log driver.
            'path' => storage_path('logs/laravel.log'), // Log file path.
            'level' => env('LOG_LEVEL', 'debug'), // Minimum level.
            'max_files' => 3, // Files to keep.
            'replace_placeholders' => true, // Replace placeholders.
        ],

        'slack' => [
            'driver' => 'slack', // Log driver.
            'url' => env('LOG_SLACK_WEBHOOK_URL'), // Webhook URL.
            'username' => env('LOG_SLACK_USERNAME', env('APP_NAME', 'Laravel')), // Sender name.
            'emoji' => env('LOG_SLACK_EMOJI', ':boom:'), // Message emoji.
            'level' => env('LOG_LEVEL', 'critical'), // Minimum level.
            'replace_placeholders' => true, // Replace placeholders.
        ],

        'papertrail' => [
            'driver' => 'monolog', // Log driver.
            'level' => env('LOG_LEVEL', 'debug'), // Minimum level.
            'handler' => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class), // Log handler.
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'), // Papertrail host.
                'port' => env('PAPERTRAIL_PORT'), // Papertrail port.
                'connectionString' => 'tls://'.env('PAPERTRAIL_URL').':'.env('PAPERTRAIL_PORT'), // TLS connection.
            ],
            'processors' => [PsrLogMessageProcessor::class], // Log processors.
        ],

        'stderr' => [
            'driver' => 'monolog', // Log driver.
            'level' => env('LOG_LEVEL', 'debug'), // Minimum level.
            'handler' => StreamHandler::class, // Log handler.
            'handler_with' => [
                'stream' => 'php://stderr', // Error stream.
            ],
            'formatter' => env('LOG_STDERR_FORMATTER'), // Log formatter.
            'processors' => [PsrLogMessageProcessor::class], // Log processors.
        ],

        'syslog' => [
            'driver' => 'syslog', // Log driver.
            'level' => env('LOG_LEVEL', 'debug'), // Minimum level.
            'facility' => env('LOG_SYSLOG_FACILITY', LOG_USER), // Syslog facility.
            'replace_placeholders' => true, // Replace placeholders.
        ],

        'errorlog' => [
            'driver' => 'errorlog', // Log driver.
            'level' => env('LOG_LEVEL', 'debug'), // Minimum level.
            'replace_placeholders' => true, // Replace placeholders.
        ],

        'null' => [
            'driver' => 'monolog', // Log driver.
            'handler' => NullHandler::class, // Discard logs.
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'), // Emergency log path.
        ],

    ],

];
