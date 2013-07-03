<?php

$loader = require __DIR__ . "/../vendor/autoload.php";

use Doctrine\Common\Annotations\AnnotationRegistry;
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

define('TEST_BASE_DIR', __DIR__);

define('PROXY_DIR', TEST_BASE_DIR . DIRECTORY_SEPARATOR . 'proxy');
shell_exec(sprintf("rm -rf %s/*", PROXY_DIR));
