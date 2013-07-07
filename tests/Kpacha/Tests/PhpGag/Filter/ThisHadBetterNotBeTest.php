<?php

namespace Kpacha\Tests\PhpGag\Filter;

use Kpacha\Tests\PhpGag\Filter\Mocks\ThisHadBetterNotBeMock;

/**
 * Test of the ThisHadBetterBe rule
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class ThisHadBetterNotBeTest extends AbstractFilterTest
{
    protected $_subject = null;

    public function setUp()
    {
        parent::setUp();
        $this->_subject = new ThisHadBetterNotBeMock();
        
        $this->_subject->shouldBeNotNull = 0;
        $this->_subject->shouldBeNotPositive = 0;
        $this->_subject->shouldBeNotNegative = 0;
        $this->_subject->shouldBeNotZero = null;
    }
    
    public function testFilter()
    {
        $original = $this->_subject;
        $this->filter->filterEntity($this->_subject);
        $this->assertEquals($original, $this->_subject);
    }
    
    /**
     * @expectedException        Kpacha\PhpGag\Filter\FilterException
     * @expectedExceptionMessage The received value  is not what it should be
     */
    public function testDetectNull()
    {
        $this->_subject->shouldBeNotNull = null;
        $this->filter->filterEntity($this->_subject);
    }
    
    /**
     * @expectedException        Kpacha\PhpGag\Filter\FilterException
     * @expectedExceptionMessage The received value -1 is not what it should be
     */
    public function testDetectNegative()
    {
        $this->_subject->shouldBeNotNegative = -1;
        $this->filter->filterEntity($this->_subject);
    }
    
    /**
     * @expectedException        Kpacha\PhpGag\Filter\FilterException
     * @expectedExceptionMessage The received value 0 is not what it should be
     */
    public function testDetectZero()
    {
        $this->_subject->shouldBeNotZero = 0;
        $this->filter->filterEntity($this->_subject);
    }
    
    /**
     * @expectedException        Kpacha\PhpGag\Filter\FilterException
     * @expectedExceptionMessage The received value 1 is not what it should be
     */
    public function testDetectPositive()
    {
        $this->_subject->shouldBeNotPositive = 1;
        $this->filter->filterEntity($this->_subject);
    }

}
