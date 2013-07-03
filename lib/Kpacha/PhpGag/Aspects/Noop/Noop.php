<?php
namespace Kpacha\PhpGag\Aspects\Noop;

use PUGX\AOP\Aspect\AspectInterface,
    PUGX\AOP\Aspect\BaseAnnotation;

class Noop implements AspectInterface
{

    /**
     * @inheritdoc
     */
    public function trigger(BaseAnnotation $annotation, $instance, $methodName, array $arguments)
    {
        return 0;
    }
}
