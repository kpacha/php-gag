<?php

namespace Kpacha\PhpGag\Aspects\ImaLetYouFinishBut;

use PUGX\AOP\Aspect\AspectInterface,
    PUGX\AOP\Aspect\BaseAnnotation,
    Kpacha\PhpGag\Aspects\AspectException;

class ImaLetYouFinishBut implements AspectInterface
{

    /**
     * @inheritdoc
     */
    public function trigger(BaseAnnotation $annotation, $instance, $methodName, array $arguments)
    {
        if (!method_exists($instance, $annotation->value)) {
            throw new AspectException("Unknown method {$annotation->value}");
        }
        $instance->{$annotation->value}();
        return null;
    }

}
