<?php

namespace Kpacha\PhpGag\Enforcers;
use DMS\Filter\Rules\Rule;

/**
 * Enforces that the annotated parameter has the specified property.
 *
 * @author Kpacha <kpacha666@gmail.com>
 *
 * @Annotation
 */
class ThisHadBetterBe extends Rule
{
    const NEGATIVE = 0;
    const NULL = 1;
    const POSITIVE = 2;
    const THE_BLUE_PILL = 3;
    const THE_RED_PILL = 4;
    const THE_STOLEN_DEATH_STAR_PLANS = 5;
    const ZERO = 6;

    public $expected = self::THE_STOLEN_DEATH_STAR_PLANS;
    
    /**
     * {@inheritDoc}
     */
    public function applyFilter($value)
    {
        if(!$this->validate($value)){
            throw new EnforcerException("The received value $value is not what it should be");
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
