<?php

namespace Kpacha\PhpGag\Aspects\CantTouchThis;

use PUGX\AOP\Aspect\AspectInterface,
    PUGX\AOP\Aspect\BaseAnnotation;

/**
 * Replaces the implementation of the annotated method to instead print "Stop"
 * along with the specified reason to standard out. For example, calling the method:
 *
 * (@)CantTouchThis
 * public funciton tryToTouchThis() {
 *     echo "This has been touched.";
 * }
 *
 * will cause "Stop, HAMMERTIME" to be printed to standard out.
 *
 * Methods returning primitive numeric values return the equivalent of 0;
 * methods returning boolean return false; methods returning objects return null.
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
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
