<?php
namespace Kpacha\PhpGag\Aspects\AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything;

use PUGX\AOP\Aspect\BaseAnnotation;
use PUGX\AOP\Aspect\Validator\Validator;

/**
 * Causes the annnotated numeric parameter to evaluate to the Answer to
 * the Ultimate Question of Life, the Universe and Everything.
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class AnswerToTheUltimateQuestionOfLifeTheUniverseAndEverything extends Validator
{

    /**
     * @inheritdoc
     */
    public function trigger(BaseAnnotation $annotation, $instance, $methodName, array $arguments)
    {
        return 42;
    }
}
