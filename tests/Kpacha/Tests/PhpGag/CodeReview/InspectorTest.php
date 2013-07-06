<?php

namespace Kpacha\Tests\PhpGag\CodeReview;

use Kpacha\PhpGag\CodeReview\AnalysisResult;
use Kpacha\PhpGag\CodeReview\Inspector;
use \PHPUnit_Framework_TestCase as TestCase;

class InspectorTest extends TestCase
{

    public function testClassDetection()
    {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'Mocks' . DIRECTORY_SEPARATOR . 'NotAnnotated.php';
        $mockedReader = $this->mockReader();
        $subject = new Inspector($mockedReader);
        $expectedResult = new AnalysisResult;
        $expectedResult->setMethodAnnotations(array(
            '__construct' => array(),
            'getShouldBeNull' => array(),
            'setShouldBeNull' => array(),
            'getShouldBePositive' => array(),
            'setShouldBePositive' => array(),
            'doSomething' => array()
        ));
        $expectedResult->setPropertyAnnotations(array(
            'shouldBeNull' => array(),
            'shouldBePositive' => array()
        ));
        $this->assertEquals(
                array('Kpacha\Tests\PhpGag\CodeReview\Mocks\NotAnnotated' => $expectedResult), $subject->inspect($file)
        );
    }

    protected function mockReader($classAnnotations = array(), $methodAnnotations = array(),
            $propertyAnnotations = array())
    {
        $methodsToMock = array(
            'getClassAnnotations', 'getMethodAnnotations', 'getPropertyAnnotations',
            'getClassAnnotation', 'getMethodAnnotation', 'getPropertyAnnotation'
        );
        $inspector = $this->getMockBuilder('Doctrine\Common\Annotations\Reader', $methodsToMock)
                ->disableOriginalConstructor()
                ->getMock();
        $inspector->expects($this->any())
                ->method('getClassAnnotations')
                ->will($this->returnValue($classAnnotations));
        $inspector->expects($this->any())
                ->method('getMethodAnnotations')
                ->will($this->returnValue($methodAnnotations));
        $inspector->expects($this->any())
                ->method('getPropertyAnnotations')
                ->will($this->returnValue($propertyAnnotations));

        return $inspector;
    }

}
