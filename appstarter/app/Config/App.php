<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    public $baseURL = 'http://localhost:8080/';

    public $allowedHostnames = [];

    public $indexPage = 'index.php';

    public $uriProtocol = 'REQUEST_URI';

    public $permittedURIChars = 'a-z 0-9~%.:_\-';

    public $defaultLocale = 'en';

    public $negotiateLocale = false;

    public $supportedLocales = ['en'];

    public $appTimezone = 'UTC';

    public $charset = 'UTF-8';

    public $forceGlobalSecureRequests = false;

    public $proxyIPs = [];

    public $CSPEnabled = false;
}
