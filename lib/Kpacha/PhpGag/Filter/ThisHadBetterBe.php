<?php

namespace Kpacha\PhpGag\Filter;
use DMS\Filter\Rules\Rule;
use PUGX\AOP\Aspect\Validator\Annotation as ValidatorAnnotation;

/**
 * Validates that the annotated property has the specified property.
 *
 * @author Kpacha <kpacha666@gmail.com>
 *
 * @Annotation
 */
class ThisHadBetterBe extends Rule
{
    const NEGATIVE = ValidatorAnnotation::NEGATIVE;
    const NULL = ValidatorAnnotation::NULL;
    const POSITIVE = ValidatorAnnotation::POSITIVE;
    const THE_BLUE_PILL = 100;
    const THE_RED_PILL = 101;
    const THE_STOLEN_DEATH_STAR_PLANS = 102;
    const ZERO = ValidatorAnnotation::ZERO;

    public $expected = self::THE_STOLEN_DEATH_STAR_PLANS;
    
    /**
     * {@inheritDoc}
     */
    public function applyFilter($value)
    {
        if(!$this->validate($value)){
            throw new FilterException("The received value $value is not what it should be");
        }
        return $value;
    }
    
    protected function validate($value)
    {
        $return = false;
        switch($this->expected){
            case self::NEGATIVE:
                $return = ($value < 0);
                break;
            case self::NULL:
                $return = ($value === null);
                break;
            case self::POSITIVE:
                $return = ($value > 0);
                break;
            case self::ZERO:
                $return = ($value === 0);
                break;
        }
        return $return;
    }
    
    public function getDefaultOption()
    {
        return 'expected';
    }
}
