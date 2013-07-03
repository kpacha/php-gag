<?php

namespace Kpacha\Tests\PhpGag\Enforcers;

use DMS\Filter\Mapping\ClassMetadataFactory,
    DMS\Filter\Filter,
    Doctrine\Common\Annotations\AnnotationReader,
    Kpacha\PhpGag\Mapping\Loader\AnnotationLoader,
    \PHPUnit_Framework_TestCase as TestCase;

/**
 * Abstract Test for the enforcer rules
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
abstract class AbstractEnforcerTest extends TestCase
{

    protected $filter = null;

    public function setUp()
    {
        //Get Doctrine Reader
        $reader = new AnnotationReader();

        //Load AnnotationLoader
        $enforcerLoader = new AnnotationLoader($reader);

        //Get a Filter
        $this->filter = new Filter(new ClassMetadataFactory($enforcerLoader));
    }

}
