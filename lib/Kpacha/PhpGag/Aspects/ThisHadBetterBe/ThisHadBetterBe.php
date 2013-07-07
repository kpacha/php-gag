<?php
namespace Kpacha\PhpGag\Aspects\ThisHadBetterBe;

use PUGX\AOP\Aspect\Validator\Validator;
use Respect\Validation\Validator as v;

/**
 * Enforces that the annotated parameter has the specified property.
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class ThisHadBetterBe extends Validator
{
    
    protected function getValidator($validationType)
    {
        switch($validationType){
            case Annotation::THE_BLUE_PILL:
                return v::numeric()->even();
                break;
            case Annotation::THE_RED_PILL:
                return v::numeric()->odd();
                break;
            case Annotation::THE_STOLEN_DEATH_STAR_PLANS:
                return v::alpha()->notEmpty();
                break;
            default:
                return parent::getValidator($validationType);
                break;
        }
    }
}
