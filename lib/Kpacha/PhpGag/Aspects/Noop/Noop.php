<?php
namespace Kpacha\PhpGag\Aspects\Noop;

use PUGX\AOP\Aspect\AspectInterface,
    PUGX\AOP\Aspect\BaseAnnotation;

/**
 * Causes the annotated method or all the methods of the annotated class to
 * become noop.
 *
 * Methods returning primitive numeric values return
 * the equivalent of 0; methods returning boolean return false;
 * methods returning objects return null.
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
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
