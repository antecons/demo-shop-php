<?php

/**
 * Basic configuration.
 *
 * @copyright   Copyright (c) 2014 Antecons
 * @license     http://www.opensource.org/licenses/mit-license.html  MIT License
 */

// Absolute path to base.
if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');

// Include directory.
if (!defined('INCLUDE_PATH'))
    define('INCLUDE_PATH', ABSPATH . 'inc/');

// Lib directory.
if (!defined('LIB_PATH'))
    define('LIB_PATH', ABSPATH . 'lib/');

// Include directory.
if (!defined('DB_PATH'))
    define('DB_PATH', ABSPATH . 'db/');

// Set Antecons vars.
define('ANTECONS_API_KEY', 'abc');
define('ANTECONS_API_SECRET', 'def');
define('ANTECONS_DATASOURCE', 'test');

// Import the Antecons library.
require_once(LIB_PATH . 'antecons/lib/antecons.php');
Antecons\Client::$apiKey = ANTECONS_API_KEY;
Antecons\Client::$apiSecret = ANTECONS_API_SECRET;

// Include all the functions.
require_once(INCLUDE_PATH . 'functions.php');
