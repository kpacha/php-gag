<?php
namespace Kpacha\PhpGag\Aspects\ThisHadBetterNotBe;

use Kpacha\PhpGag\Aspects\ThisHadBetterBe\ThisHadBetterBe;
use Kpacha\PhpGag\Aspects\AspectException;

/**
 * Enforces that the annotated parameter has not the specified property.
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class ThisHadBetterNotBe extends ThisHadBetterBe
{
    protected function validate($annotation, $value)
    {
        if ($this->getValidator($annotation->value)->validate($value)) {
            throw new AspectException('The parameter [' . $annotation->getParameterToInspect() . "] has an invalid value [$value]");
        }
    }
}
