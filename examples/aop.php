<?php

$loader = require_once '../vendor/autoload.php';

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use PUGX\AOP\ProxyGenerator;
use Doctrine\Common\Annotations\AnnotationRegistry;
use PUGX\AOP\AspectGenerator;
use Kpacha\PhpGag\Aspects;

// integrate autoloading (composer is recommended) and annotations mapping
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
AnnotationRegistry::registerFile('NonGAGAnnotation.php');

// instantiate the Symfony2 DIC
$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__));
$loader->load(__DIR__ . DIRECTORY_SEPARATOR . 'container.yml');

// define a directory where the proxy classes - containing the aspects - will be generated
$proxyDir = __DIR__ . DIRECTORY_SEPARATOR . 'proxy/';

require 'Dummy.php';

$refClass = new ReflectionClass('\Example\Dummy');
$filename = $proxyDir . str_replace('\\', '-', $refClass->name) . '.php';

$pg = new ProxyGenerator($refClass, array(
            new AspectGenerator(new AnnotationReader(), '\PUGX\AOP\Aspect\BaseAnnotation'),
        ));
$pg->writeClass($filename);
require $filename;

$proxyClass = $pg->getClassName($refClass);

$loggableAspect = new \PUGX\AOP\Aspect\Loggable\Loggable($container);
$noopAspect = new Aspects\Noop\Noop($container);
$rouletteAspect = new Aspects\Roulette\Roulette($container);
$cantTouchThisAspect = new Aspects\CantTouchThis\CantTouchThis($container);
$imaLetYouFinishButAspect = new Aspects\ImaLetYouFinishBut\ImaLetYouFinishBut($container);

$proxy = new $proxyClass(1, 2, $loggableAspect, $noopAspect, $rouletteAspect, $cantTouchThisAspect, $imaLetYouFinishButAspect);
echo $proxy->doSomething(5);
$proxy->replay("supu, tupu, lapu\n");
echo $proxy->tryToTouch();
//echo $proxy->doSomethingSometimes(1);
echo $proxy->doSomethingStupidSometimes(1);
echo $proxy->doSomethingStupid(5);
