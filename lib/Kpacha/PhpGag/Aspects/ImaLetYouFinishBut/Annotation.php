<?php

namespace Kpacha\PhpGag\Aspects\ImaLetYouFinishBut;

use PUGX\AOP\Aspect\BaseAnnotation;

/**
 * Annotation class for the ImaLetYouFinishBut aspect.
 *
 * @author Kpacha <kpacha666@gmail.com>
 *
 * @Annotation
 */
class Annotation extends BaseAnnotation
{
    public $method = '';
    protected $_aspectName = 'ImaLetYouFinishBut';

}
