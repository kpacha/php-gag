<?php

namespace Example;

/**
 * Description of NonGAGAnnotation
 *
 * @author Kpacha <kpacha666@gmail.com>
 * 
 * @Annotation
 */
class NonGAGAnnotation
{

    private $value;

    public function __construct($value = null)
    {
        $this->value = $value;
    }

}
