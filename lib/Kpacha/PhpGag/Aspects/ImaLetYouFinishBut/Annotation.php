<?php

namespace Kpacha\PhpGag\Aspects\ImaLetYouFinishBut;

use PUGX\AOP\Aspect\BaseAnnotation;

/**
 * Annotation class for the ImaLetYouFinishBut aspect.
 * 
 * @Annotation
 */
class Annotation extends BaseAnnotation
{
    public $method = '';
    protected $_aspectName = 'ImaLetYouFinishBut';

}
