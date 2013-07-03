<?php

namespace Kpacha\PhpGag\Aspects\Roulette;

use PUGX\AOP\Aspect\BaseAnnotation;

/**
 * Annotation class for the Roulette aspect.
 * 
 * @Annotation
 */
class Annotation extends BaseAnnotation
{

    public $probability = 0.5;
    public $exception = '\Kpacha\PhpGag\Aspects\AspectException';
    public $message = 'Random error dispatched from Roulette aspect';
    protected $_aspectName = 'Roulette';

}
