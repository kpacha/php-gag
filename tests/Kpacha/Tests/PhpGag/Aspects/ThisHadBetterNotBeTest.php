<?php

namespace Kpacha\Tests\PhpGag\Aspects;

use Kpacha\PhpGag\Aspects\ThisHadBetterNotBe\ThisHadBetterNotBe;

class ThisHadBetterNotBeTest extends AspectsTest
{

    private static $proxy = null;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        $proxyClass = self::getProxyClass('\Kpacha\Tests\PhpGag\Aspects\Mocks\ThisHadBetterNotBeMock');
        self::$proxy = new $proxyClass(1, 2, new ThisHadBetterNotBe(null));
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
     * @expectedExceptionMessage The parameter [parameter] has an invalid value [supu]
     */
    public function testDetectAlpha()
    {
        $this->assertTrue(self::$proxy->shouldJustAcceptEmptyStrings('supu'));
        self::$proxy->shouldJustAcceptEmptyStrings(null);
    }

}
