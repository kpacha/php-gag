<?php

namespace Kpacha\Tests\PhpGag\Aspects\Mocks;

use Kpacha\PhpGag\Aspects\ThisHadBetterBe\Annotation as ThisHadBetterBe;

class ThisHadBetterBeMock extends BaseMock
{

    /**
     * @ThisHadBetterBe(parameter="c",value=ThisHadBetterBe::POSITIVE)
     * 
     * @param float $c
     * @return float
     */
    public function getSqrt($c)
    {
        return sqrt($c);
    }

    /**
     * @ThisHadBetterBe(parameter="argument",value=ThisHadBetterBe::THE_RED_PILL)
     * 
     * @param float $c
     * @return float
     */
    public function shouldNotAcceptEvenNumbers($argument)
    {
        return $argument % 2 != 0;
    }

    /**
     * @ThisHadBetterBe(parameter="parameter",value=ThisHadBetterBe::THE_BLUE_PILL)
     * 
     * @param float $c
     * @return float
     */
    public function shouldNotAcceptOddNumbers($parameter)
    {
        return $parameter % 2 == 0;
    }

    /**
     * @ThisHadBetterBe(parameter="parameter",value=ThisHadBetterBe::THE_STOLEN_DEATH_STAR_PLANS)
     * 
     * @param float $c
     * @return float
     */
    public function shouldJustAcceptStrings($parameter)
    {
        return is_string($parameter);
    }

    /**
     * @ThisHadBetterBe(parameter="subject",value=ThisHadBetterBe::NOT_NULL)
     * @ThisHadBetterBe(parameter="times",value=ThisHadBetterBe::POSITIVE)
     * 
     * @param \stdClass $subject
     * @param int $times
     * @return array
     */
    public function replicateThis(\stdClass $subject, $times)
    {
        $replications = array();
        for ($current = 0; $current < $times; $current++) {
            $replications[$current] = $subject;
        }
        return $replications;
    }

}
