<?php

namespace Kpacha\Tests\PhpGag\Filter;

use DMS\Filter\Mapping\ClassMetadataFactory,
    DMS\Filter\Filter,
    Doctrine\Common\Annotations\AnnotationReader,
    Kpacha\PhpGag\Mapping\Loader\AnnotationLoader,
    \PHPUnit_Framework_TestCase as TestCase;

/**
 * Abstract Test for the filter rules
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
abstract class AbstractFilterTest extends TestCase
{

    protected $filter = null;

    public function setUp()
    {
        //Get a Filter
        $this->filter = new Filter(new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader())));
    }

}
