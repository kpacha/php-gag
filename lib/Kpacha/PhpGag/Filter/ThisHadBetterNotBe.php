<?php

namespace Kpacha\PhpGag\Filter;

/**
 * Enforces that the annotated property does not have the specified property.
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
