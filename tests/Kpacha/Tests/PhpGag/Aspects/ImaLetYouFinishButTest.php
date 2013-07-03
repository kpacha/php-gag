<?php

namespace Kpacha\Tests\PhpGag\Aspects;

use Kpacha\PhpGag\Aspects\ImaLetYouFinishBut\ImaLetYouFinishBut;

class ImaLetYouFinishButTest extends AspectsTest
{

    protected static $introduction = 'Hi everybody!';
    protected static $speech = 'Lorem ipsum';
    protected static $proxy = null;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        $proxyClass = self::getProxyClass('\Kpacha\Tests\PhpGag\Aspects\Mocks\ImaLetYouFinishButMock');
        self::$proxy = new $proxyClass(self::$introduction, new ImaLetYouFinishBut);
    }

    public function testAspect()
    {
        self::$proxy->replay(self::$speech);
        $this->assertEquals(self::$introduction . self::$speech, self::$proxy->getContent());
    }

}
