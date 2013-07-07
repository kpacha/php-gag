<?php

namespace Kpacha\Tests\PhpGag\Filter;

use Kpacha\Tests\PhpGag\Filter\Mocks\ThisHadBetterBeMock;

/**
 * Test of the ThisHadBetterBe rule
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class ThisHadBetterBeTest extends AbstractFilterTest
{
    protected $_subject = null;

    public function setUp()
    {
        parent::setUp();
        $this->_subject = new ThisHadBetterBeMock();
        
        $this->_subject->shouldBeNull = null;
        $this->_subject->shouldBePositive = 43;
        $this->_subject->shouldBeNegative = -43;
        $this->_subject->shouldBeZero = 0;
    }
    
    public function testFilter()
    {
        $original = $this->_subject;
        $this->filter->filterEntity($this->_subject);
        $this->assertEquals($original, $this->_subject);
    }
    
    /**
     * @expectedException        Kpacha\PhpGag\Filter\FilterException
     * @expectedExceptionMessage The received value 1 is not what it should be
     */
    public function testDetectNotNull()
    {
        $this->_subject->shouldBeNull = 1;
        $this->filter->filterEntity($this->_subject);
    }
    
    /**
     * @expectedException        Kpacha\PhpGag\Filter\FilterException
     * @expectedExceptionMessage The received value 1 is not what it should be
     */
    public function testDetectNotNegative()
    {
        $this->_subject->shouldBeNegative = 1;
        $this->filter->filterEntity($this->_subject);
    }
    
    /**
     * @expectedException        Kpacha\PhpGag\Filter\FilterException
     * @expectedExceptionMessage The received value 1 is not what it should be
     */
    public function testDetectNotZero()
    {
        $this->_subject->shouldBeZero = 1;
        $this->filter->filterEntity($this->_subject);
    }
    
    /**
     * @expectedException        Kpacha\PhpGag\Filter\FilterException
     * @expectedExceptionMessage The received value -1 is not what it should be
     */
    public function testDetectNotPositive()
    {
        $this->_subject->shouldBePositive = -1;
        $this->filter->filterEntity($this->_subject);
    }

}
