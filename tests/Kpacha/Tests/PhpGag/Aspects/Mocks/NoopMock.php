<?php
namespace Kpacha\Tests\PhpGag\Aspects\Mocks;

use Kpacha\PhpGag\Aspects\Noop\Annotation as Noop;

class NoopMock extends BaseMock
{

    /**
     * @Noop
     */
    public function doSomethingStupid($c)
    {
        $this->a = $this->b = $c;
    }
}
