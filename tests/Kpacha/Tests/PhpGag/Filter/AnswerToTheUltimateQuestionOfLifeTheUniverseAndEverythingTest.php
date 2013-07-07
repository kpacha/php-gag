<?php

namespace Kpacha\Tests\PhpGag\Filter;

use Kpacha\Tests\PhpGag\Filter\Mocks\AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverythingMock;

/**
 * Test of the AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything rule
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverythingTest extends AbstractFilterTest
{

    public function testFilter()
    {   
        $mock = new AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverythingMock();
        $this->filter->filterEntity($mock);
        $this->assertEquals(42, $mock->value);
    }

}
