<?php

namespace Kpacha\Tests\PhpGag\Aspects;

use Kpacha\PhpGag\Aspects\AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything\AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything;

class AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverythingTest extends AspectsTest
{

    public function testAspect()
    {
        $proxyClass = $this->getProxyClass('\Kpacha\Tests\PhpGag\Aspects\Mocks\AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverythingMock');
        $proxy = new $proxyClass(1, 2, new AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything(null));
        $this->assertEquals(42, $proxy->setAll(1));
    }

}
