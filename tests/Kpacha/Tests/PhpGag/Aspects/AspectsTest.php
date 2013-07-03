<?php

namespace Kpacha\Tests\PhpGag\Aspects;

use Doctrine\Common\Annotations\AnnotationReader,
    \PHPUnit_Framework_TestCase as TestCase,
    \ReflectionClass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use PUGX\AOP\ProxyGenerator;
use PUGX\AOP\AspectGenerator;

abstract class AspectsTest extends TestCase
{

    public static function setUpBeforeClass()
    {
        // instantiate the Symfony2 DIC
        $container = new ContainerBuilder();
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__));
        $loader->load(TEST_BASE_DIR . DIRECTORY_SEPARATOR . 'container.yml');
    }

    protected static function getProxyClass($className)
    {
        $refClass = new ReflectionClass($className);
        $filename = PROXY_DIR . '/' . str_replace('\\', '-', $refClass->name) . '.php';

        $pg = new ProxyGenerator($refClass, array(
                    new AspectGenerator(new AnnotationReader(), '\PUGX\AOP\Aspect\BaseAnnotation'),
                ));
        $pg->writeClass($filename);
        require $filename;

        return $pg->getClassName($refClass);
    }

}
