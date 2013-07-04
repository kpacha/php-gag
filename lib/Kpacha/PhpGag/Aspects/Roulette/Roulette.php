<?php
namespace Kpacha\PhpGag\Aspects\Roulette;

use PUGX\AOP\Aspect\AspectInterface,
    PUGX\AOP\Aspect\BaseAnnotation;

/**
 * Causes the annotated method to throw the indicated throwable with the specified probability.
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class Roulette implements AspectInterface
{

    /**
     * @inheritdoc
     */
    public function trigger(BaseAnnotation $annotation, $instance, $methodName, array $arguments)
    {
        if(mt_rand(0, 1000) <= $annotation->probability * 1000) {
            $exceptionClass = $annotation->exception;
            throw new $exceptionClass($annotation->message);
        }
        return null;
    }
}
