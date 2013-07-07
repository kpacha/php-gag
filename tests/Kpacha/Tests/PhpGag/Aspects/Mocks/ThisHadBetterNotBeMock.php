<?php

namespace Kpacha\Tests\PhpGag\Aspects\Mocks;

use Kpacha\PhpGag\Aspects\ThisHadBetterNotBe\Annotation as ThisHadBetterNotBe;

class ThisHadBetterNotBeMock extends BaseMock
{

    /**
     * @ThisHadBetterNotBe(parameter="c",value=ThisHadBetterNotBe::NEGATIVE)
     * @ThisHadBetterNotBe(parameter="c",value=ThisHadBetterNotBe::ZERO)
     * 
     * @param float $c
     * @return float
     */
    public function getSqrt($c)
    {
        return sqrt($c);
    }

    /**
     * @ThisHadBetterNotBe(parameter="argument",value=ThisHadBetterNotBe::THE_BLUE_PILL)
     * 
     * @param int $c
     * @return bool
     */
    public function shouldNotAcceptEvenNumbers($argument)
    {
        return $argument % 2 != 0;
    }

    /**
     * @ThisHadBetterNotBe(parameter="parameter",value=ThisHadBetterNotBe::THE_RED_PILL)
     * 
     * @param int $c
     * @return bool
     */
    public function shouldNotAcceptOddNumbers($parameter)
    {
        return $parameter % 2 == 0;
    }

    /**
     * @ThisHadBetterNotBe(parameter="parameter",value=ThisHadBetterNotBe::THE_STOLEN_DEATH_STAR_PLANS)
     * 
     * @param string $c
     * @return bool
     */
    public function shouldJustAcceptEmptyStrings($parameter)
    {
        return is_string($parameter) && !$parameter;
    }

    /**
     * @ThisHadBetterNotBe(parameter="subject",value=ThisHadBetterNotBe::NULL)
     * @ThisHadBetterNotBe(parameter="times",value=ThisHadBetterNotBe::NEGATIVE)
     * @ThisHadBetterNotBe(parameter="times",value=ThisHadBetterNotBe::ZERO)
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
