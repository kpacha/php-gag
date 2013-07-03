<?php

namespace Kpacha\Tests\PhpGag\Aspects;

use Kpacha\PhpGag\Aspects\Roulette\Roulette;

class RouletteTest extends AspectsTest
{

    private static $proxy = null;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        $proxyClass = self::getProxyClass('\Kpacha\Tests\PhpGag\Aspects\Mocks\RouletteMock');
        self::$proxy = new $proxyClass(1, 2, new Roulette);
    }
    
    /**
     * @expectedException        Kpacha\PhpGag\Aspects\AspectException
     * @expectedExceptionMessage Random error dispatched from Roulette aspect
     */
    public function testRouletteKO()
    {
        self::$proxy->doSomethingSometimes();
    }

    public function testRouletteOK()
    {
        $this->assertEquals('done!', self::$proxy->doSomething());
    }

}
