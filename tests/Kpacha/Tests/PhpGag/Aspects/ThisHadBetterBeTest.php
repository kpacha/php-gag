<?php

namespace Kpacha\Tests\PhpGag\Aspects;

use Kpacha\PhpGag\Aspects\ThisHadBetterBe\ThisHadBetterBe;

class ThisHadBetterBeTest extends AspectsTest
{

    private static $proxy = null;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        $proxyClass = self::getProxyClass('\Kpacha\Tests\PhpGag\Aspects\Mocks\ThisHadBetterBeMock');
        self::$proxy = new $proxyClass(1, 2, new ThisHadBetterBe(null));
    }

    public function testAspect()
    {
        $this->assertEquals(2, self::$proxy->getSqrt(4));
        $sample = new \stdClass;
        $sample->name = 'supu';
        $this->assertEquals(array($sample, $sample, $sample), self::$proxy->replicateThis($sample, 3));
    }

    /**
     * @expectedException        \PUGX\AOP\Exception
     * @expectedExceptionMessage The parameter [c] has an invalid value [-1]
     */
    public function testDetectNegative()
    {
        $this->assertEquals(2, self::$proxy->getSqrt(4));
        self::$proxy->getSqrt(-1);
    }

    /**
     * @expectedException        \PUGX\AOP\Exception
     * @expectedExceptionMessage The parameter [parameter] has an invalid value [1]
     */
    public function testDetectOdd()
    {
        $this->assertTrue(self::$proxy->shouldNotAcceptOddNumbers(2));
        self::$proxy->shouldNotAcceptOddNumbers(1);
    }

    /**
     * @expectedException        \PUGX\AOP\Exception
     * @expectedExceptionMessage The parameter [argument] has an invalid value [2]
     */
    public function testDetectEven()
    {
        $this->assertTrue(self::$proxy->shouldNotAcceptEvenNumbers(1));
        self::$proxy->shouldNotAcceptEvenNumbers(2);
    }

    /**
     * @expectedException        \PUGX\AOP\Exception
     * @expectedExceptionMessage The parameter [parameter] has an invalid value []
     */
    public function testDetectAlpha()
    {
        $this->assertTrue(self::$proxy->shouldJustAcceptStrings('supu'));
        self::$proxy->shouldJustAcceptStrings(null);
    }

}
