<?php

namespace Kpacha\Tests\PhpGag\Enforcers;

use Kpacha\Tests\PhpGag\Enforcers\Mocks\AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverythingMock;

/**
 * Test of the AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything rule
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverythingTest extends AbstractEnforcerTest
{

    public function testEnforcer()
    {   
        $mock = new AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverythingMock();
        $this->filter->filterEntity($mock);
        $this->assertEquals(42, $mock->value);
    }

}
