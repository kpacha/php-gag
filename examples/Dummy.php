<?php

namespace Example;

// import the Loggable aspect as Log
use PUGX\AOP\Aspect\Loggable\Annotation as Log;
use Kpacha\PhpGag\Aspects\Noop\Annotation as Noop;
use Kpacha\PhpGag\Aspects\Roulette\Annotation as Roulette;
use Kpacha\PhpGag\Aspects\CantTouchThis\Annotation as CantTouchThis;
use Kpacha\PhpGag\Aspects\ImaLetYouFinishBut\Annotation as ImaLetYouFinishBut;
use Kpacha\PhpGag\Enforcers\AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything;

/**
 * some doc comments go here
 * 
 * @link http://github.com/kpacha/php-gag the project homepage
 * @\Example\NonGAGAnnotation
 */
class Dummy
{

    /**
     * @AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything
     *
     * @var int
     */
    protected $a;
    protected $b;
    
    public function getA()
    {
        return $this->a;
    }
    
    public function getB()
    {
        return $this->b;
    }

    /**
     * @Log(what="$a", when="start", with="monolog.logger_standard", as="Hey, Im getting %s as first argument")
     */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * @Log(what="$c", when="start", with="monolog.logger_standard", as="argument $c is %s")
     * @Log(what="$this->b", when="start", with="monolog.logger_standard", as="Hey, value of MyExampleClass::b is %s")
     * @Log(what="$this->b", when="end", with="monolog.logger_standard", as="HOLY COW! Now MyExampleClass::b is %s")
     * @NonGAGAnnotation
     */
    public function doSomething($c)
    {
        $this->b = $this->b * 10 + (int) $c;
    }

    /**
     * @Noop
     * @NonGAGAnnotation(3)
     */
    public function doSomethingStupid($c)
    {
        $this->a = $this->b = $c;
    }

    /**
     * @Roulette
     */
    public function doSomethingSometimes($c)
    {
        $this->a = $this->b = $c;
    }

    /**
     * @Roulette(probability="0.1", message="supu")
     * @Noop
     */
    public function doSomethingStupidSometimes($c)
    {
        $this->a = $this->b = $c;
    }

    /**
     * @CantTouchThis
     */
    public function tryToTouch()
    {
        throw new \Exception('Touched!');
    }

    /**
     * @ImaLetYouFinishBut("introduce")
     */
    public function replay($speech)
    {
        echo $speech;
    }

    public function introduce()
    {
        echo 'Hi everybody!';
    }

}