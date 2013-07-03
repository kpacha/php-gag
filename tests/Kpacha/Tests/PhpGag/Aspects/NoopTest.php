<?php

namespace Kpacha\Tests\PhpGag\Aspects;

use Kpacha\PhpGag\Aspects\Noop\Noop;

class NoopTest extends AspectsTest
{

    public function testAspect()
    {
        $proxyClass = $this->getProxyClass('\Kpacha\Tests\PhpGag\Aspects\Mocks\NoopMock');
        $proxy = new $proxyClass(1, 2, new Noop(null));
        $this->assertEquals(0, $proxy->doSomethingStupid(1));
    }

}
