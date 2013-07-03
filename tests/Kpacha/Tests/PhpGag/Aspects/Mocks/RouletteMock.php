<?php
namespace Kpacha\Tests\PhpGag\Aspects\Mocks;

use Kpacha\PhpGag\Aspects\Roulette\Annotation as Roulette;

class RouletteMock extends BaseMock
{

    /**
     * @Roulette(probability="1")
     */
    public function doSomethingSometimes()
    {
        return "done!";
    }

    /**
     * @Roulette(probability="0")
     */
    public function doSomething()
    {
        return "done!";
    }
}
