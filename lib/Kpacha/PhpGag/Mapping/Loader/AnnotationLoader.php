<?php

namespace Kpacha\PhpGag\Mapping\Loader;

use DMS\Filter\Mapping\Loader\AnnotationLoader as BaseAnnotationLoader,
    Doctrine\Common\Annotations\Reader,
    Doctrine\Common\Annotations\AnnotationRegistry;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AnnotationLoader
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class AnnotationLoader extends BaseAnnotationLoader
{

    public function __construct(Reader $reader)
    {
        parent::__construct($reader);

        //Register Filter Rules Annotation Namespace
        AnnotationRegistry::registerAutoloadNamespace('Kpacha\PhpGag\Enforcers', __DIR__ . '/../../../../');
    }

}
