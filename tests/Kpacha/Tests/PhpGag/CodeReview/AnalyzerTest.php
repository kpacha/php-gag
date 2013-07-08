<?php

namespace Kpacha\Tests\PhpGag\CodeReview;

use Kpacha\PhpGag\CodeReview\Analyzer;
use Kpacha\PhpGag\CodeReview\AnalysisResult;
use \PHPUnit_Framework_TestCase as TestCase;

class AnalyzerTest extends TestCase
{

    protected $subject;

    public function setUp()
    {
        $this->subject = new Analyzer($this->mockInspector($this->mockResult()), $this->mockReporter());
    }

    public function testCollectAnnotationFromAFile()
    {
        $file = 'a.php';
        $this->assertEquals(
                array($file => $this->mockResult()),
                $this->subject->addFile($file)
                        ->compile()
                        ->getAnnotations()
        );
    }

    public function testCollectAnnotationIgnoringNonPhpFiles()
    {
        $this->subject->addFile('a.php');
        $this->subject->addFile('b');
        $this->subject->addFile('a');
        $this->assertEquals(
                array('a.php' => $this->mockResult()),
                $this->subject->compile()->getAnnotations()
        );
    }

    public function testCollectAnnotationFromSeveralFiles()
    {
        $this->subject->addFile('a.php');
        $this->subject->addFile('b.php');
        $this->subject->addFile('a.php');
        $this->assertEquals(
                array('a.php' => $this->mockResult(), 'b.php' => $this->mockResult()),
                $this->subject->compile()->getAnnotations()
        );
    }

    public function testCollectAnnotationFromAFolder()
    {
        $folder = __DIR__ . DIRECTORY_SEPARATOR . 'Mocks';
        $expectedAnnotations = array(
            $folder . DIRECTORY_SEPARATOR . 'Annotated.php' => $this->mockResult(),
            $folder . DIRECTORY_SEPARATOR . 'NotAnnotated.php' => $this->mockResult()
        );
        $this->assertEquals(
                $expectedAnnotations,
                $this->subject->addFolder($folder)
                        ->compile()
                        ->getAnnotations()
        );
    }

    public function testCollectAnnotationFromMergedData()
    {
        $folder = __DIR__ . DIRECTORY_SEPARATOR . 'Mocks';
        $file = $folder . DIRECTORY_SEPARATOR . 'Annotated.php';
        $expectedAnnotations = array(
            $file => $this->mockResult(),
            $folder . DIRECTORY_SEPARATOR . 'NotAnnotated.php' => $this->mockResult()
        );
        $this->assertEquals(
                $expectedAnnotations,
                $this->subject->addFolder($folder)->addFile($file)->addFolder($folder)
                        ->compile()
                        ->getAnnotations()
        );
    }

    /**
     * @expectedException        Kpacha\PhpGag\CodeReview\CodeReviewException
     * @expectedExceptionMessage Writting down the report!
     */
    public function testCatchReporterError()
    {
        $this->subject = new Analyzer($this->mockInspector(), $this->mockReporter(false));
        $this->subject->addFile('a')->compile();
    }

    protected function mockInspector($returnedValue = null)
    {
        $inspector = $this->getMockBuilder('Kpacha\PhpGag\CodeReview\Inspector', array('inspect'))
                ->disableOriginalConstructor()
                ->getMock();
        $inspector->expects($this->any())
                ->method('inspect')
                ->will($this->returnValue($returnedValue));

        return $inspector;
    }

    protected function mockResult()
    {
        return new AnalysisResult;
    }

    protected function mockReporter($returnedValue = true)
    {
        $inspector = $this->getMockBuilder('Kpacha\PhpGag\CodeReview\Reporter', array('report'))
                ->disableOriginalConstructor()
                ->getMock();
        $inspector->expects($this->any())
                ->method('report')
                ->will($this->returnValue($returnedValue));

        return $inspector;
    }

}
