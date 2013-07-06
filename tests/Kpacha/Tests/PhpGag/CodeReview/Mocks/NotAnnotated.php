<?php

namespace Kpacha\Tests\PhpGag\CodeReview\Mocks;

/**
 * Simple mock for the Test of the Analyzer
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class NotAnnotated
{

    public $shouldBeNull;

    /**
     * Some doc
     * @var String 
     */
    public $shouldBePositive;

    public function __construct()
    {
        $this->shouldBeNull = null;
    }

    /**
     * some comments
     *
     * @return mixed
     */
    public function getShouldBeNull()
    {
        return $this->shouldBeNull;
    }

    public function setShouldBeNull($shouldBeNull)
    {
        $this->shouldBeNull = $shouldBeNull;
    }

    public function getShouldBePositive()
    {
        return $this->shouldBePositive;
    }

    /**
     * Testing more annotations to be ignored
     *
     * @param type $shouldBePositive
     */
    public function setShouldBePositive($shouldBePositive)
    {
        $this->shouldBePositive = $shouldBePositive;
    }
    
    protected function doSomething()
    {
        return null;
    }

}
