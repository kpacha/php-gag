<?php

namespace Kpacha\PhpGag\Aspects\ThisHadBetterBe;

use PUGX\AOP\Aspect\Validator\Annotation as BaseAnnotation;
use Kpacha\PhpGag\Filter\ThisHadBetterBe as Rule;

/**
 * Annotation class for the ThisHadBetterBe aspect.
 *
 * @author Kpacha <kpacha666@gmail.com>
 *
 * @Annotation
 */
class Annotation extends BaseAnnotation
{

    const THE_BLUE_PILL = Rule::THE_BLUE_PILL;
    const THE_RED_PILL = Rule::THE_RED_PILL;
    const THE_STOLEN_DEATH_STAR_PLANS = Rule::THE_STOLEN_DEATH_STAR_PLANS;

    protected $_aspectName = 'ThisHadBetterBe';

}
