<?php

namespace Kpacha\PhpGag\Aspects\CantTouchThis;

use PUGX\AOP\Aspect\AspectInterface,
    PUGX\AOP\Aspect\BaseAnnotation;

class CantTouchThis implements AspectInterface
{

    /**
     * @inheritdoc
     */
    public function trigger(BaseAnnotation $annotation, $instance, $methodName, array $arguments)
    {
        echo $annotation->message;
        return 0;
    }

}
