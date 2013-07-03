<?php

namespace Kpacha\Tests\PhpGag\Enforcers\Mocks;

use Kpacha\PhpGag\Enforcers\ThisHadBetterBe;

/**
 * Simple mock for the Test of the ThisHadBetterBe rule
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class ThisHadBetterBeMock
{

    /**
     * @ThisHadBetterBe(ThisHadBetterBe::NULL)
     */
    public $shouldBeNull;

    /**
     * @ThisHadBetterBe(ThisHadBetterBe::POSITIVE)
     */
    public $shouldBePositive;

    /**
     * @ThisHadBetterBe(ThisHadBetterBe::NEGATIVE)
     */
    public $shouldBeNegative;

    /**
     * @ThisHadBetterBe(ThisHadBetterBe::ZERO)
     */
    public $shouldBeZero;

}
