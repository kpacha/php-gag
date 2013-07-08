<?php

namespace Kpacha\PhpGag\Aspects\ImaLetYouFinishBut;

use PUGX\AOP\Aspect\AspectInterface,
    PUGX\AOP\Aspect\BaseAnnotation,
    Kpacha\PhpGag\Aspects\AspectException;

/**
 * Causes the annotated method to first execute the parameterless method indicated
 * by the annotation's value attribute. For example:
 *
 * (@)ImaLetYouFinishBut("interrupt")
 * public void deliver(AcceptanceSpeech speech) {
 *     crowd.listen(speech);
 * }
 *
 * public void interrupt() {
 *     crowd.listen("Kindly allow me to express my own opinion first.");
 * }
 *
 * will cause the deliver method to first call the interrupt method.
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
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
