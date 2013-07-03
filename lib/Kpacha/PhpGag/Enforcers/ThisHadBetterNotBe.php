<?php

namespace Kpacha\PhpGag\Enforcers;

/**
 * Description of ThisHadBetterNotBe
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
