<?php

namespace Kpacha\PhpGag\Aspects\CantTouchThis;

use PUGX\AOP\Aspect\BaseAnnotation;

/**
 * Annotation class for the CantTouchThis aspect.
 * 
 * @Annotation
 */
class Annotation extends BaseAnnotation
{
    public $message = 'Stop, HAMMERTIME';
    protected $_aspectName = 'CantTouchThis';

}
