<?php
namespace Kpacha\Tests\PhpGag\Aspects\Mocks;

use Kpacha\PhpGag\Aspects\CantTouchThis\Annotation as CantTouchThis;
use \Exception;

class CantTouchThisMock extends BaseMock
{

    /**
     * @CantTouchThis
     */
    public function tryToTouch()
    {
        throw new Exception('Touched!');
    }
}
