<?php
namespace Kpacha\Tests\PhpGag\Aspects\Mocks;

use Kpacha\PhpGag\Aspects\AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything\Annotation as AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything;

class AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverythingMock extends BaseMock
{

    /**
     * @AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything(parameter="c")
     */
    public function setAll($c)
    {
        $this->a = $this->b = $c;
        return $this->a;
    }
}
