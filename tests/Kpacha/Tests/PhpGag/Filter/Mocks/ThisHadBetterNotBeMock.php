<?php

namespace Kpacha\Tests\PhpGag\Filter\Mocks;

use Kpacha\PhpGag\Filter\ThisHadBetterNotBe;

/**
 * Simple mock for the Test of the ThisHadBetterNotBe rule
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class ThisHadBetterNotBeMock
{

    /**
     * @ThisHadBetterNotBe(ThisHadBetterNotBe::NULL)
     */
    public $shouldBeNotNull;

    /**
     * @ThisHadBetterNotBe(ThisHadBetterNotBe::POSITIVE)
     */
    public $shouldBeNotPositive;

    /**
     * @ThisHadBetterNotBe(ThisHadBetterNotBe::NEGATIVE)
     */
    public $shouldBeNotNegative;

    /**
     * @ThisHadBetterNotBe(ThisHadBetterNotBe::ZERO)
     */
    public $shouldBeNotZero;

}
