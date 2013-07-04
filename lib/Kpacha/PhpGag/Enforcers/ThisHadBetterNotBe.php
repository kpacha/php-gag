<?php

namespace Kpacha\PhpGag\Enforcers;

/**
 * Enforces that the annotated parameter does not have the specified property.
 *
 * @author Kpacha <kpacha666@gmail.com>
 *
 * @Annotation
 */
class ThisHadBetterNotBe extends ThisHadBetterBe
{
    
    protected function validate($value)
    {
        return !parent::validate($value);
    }
}
