<?php

namespace Kpacha\Tests\PhpGag\Aspects;

use Kpacha\PhpGag\Aspects\CantTouchThis\CantTouchThis;

class CantTouchThisTest extends AspectsTest
{

    public function testAspect()
    {
        $proxyClass = self::getProxyClass('\Kpacha\Tests\PhpGag\Aspects\Mocks\CantTouchThisMock');
        $proxy = new $proxyClass(1, 2, new CantTouchThis(null));
        $this->assertEquals(0, $proxy->tryToTouch());
    }

}
