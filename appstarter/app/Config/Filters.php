<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\Cors;

class Filters extends BaseConfig
{
    /**
     * Aliases for filter classes to make reading and applying them simpler.
     *
     * @var array
     */
    public $aliases = [
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
    ];

    /**
     * Global filters that are applied before and after every request.
     *
     * CSRF is omitted here to disable it across the entire application.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // CSRF protection is disabled
        ],
        'after' => [
            'toolbar',
            'honeypot',
        ],
    ];

    /**
     * Filters that are applied based on the HTTP method (GET, POST, etc.).
     *
     * @var array
     */
    public $methods = [];

    /**
     * Filters that run on specific URI patterns before or after.
     *
     * @var array
     */
    public $filters = [];
}
