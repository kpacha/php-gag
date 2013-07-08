<?php

$loader = require __DIR__ . "/../vendor/autoload.php";

use Doctrine\Common\Annotations\AnnotationRegistry;
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

define('TEST_BASE_DIR', __DIR__);

define('PROXY_DIR', TEST_BASE_DIR . DIRECTORY_SEPARATOR . 'proxy');
shell_exec(sprintf("rm -rf %s/*", PROXY_DIR));

if (!defined('PHPCB_ROOT_DIR')) {
 define('PHPCB_ROOT_DIR', realpath(dirname(__FILE__) . '/../vendor/mayflower/php-codebrowser'));
}
if (!defined('PHPCB_SOURCE')) {
 define('PHPCB_SOURCE', realpath(PHPCB_ROOT_DIR) . '/src');
}
if (!defined('PHPCB_TEST_DIR')) {
 define('PHPCB_TEST_DIR', realpath(PHPCB_ROOT_DIR) . DIRECTORY_SEPARATOR . 'tests' . DIRECTORY_SEPARATOR . 'testData');
}
if (!defined('PHPCB_TEST_LOGS')) {
 define('PHPCB_TEST_LOGS', PHPCB_TEST_DIR . '/logs');
}
if (!defined('PHPCB_TEST_OUTPUT')) {
    define('PHPCB_TEST_OUTPUT', PHPCB_TEST_DIR . DIRECTORY_SEPARATOR . 'output');
}

require_once PHPCB_SOURCE . '/Autoload.php';
