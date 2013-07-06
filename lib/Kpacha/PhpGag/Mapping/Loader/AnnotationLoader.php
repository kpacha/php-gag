<?php

namespace Kpacha\PhpGag\Mapping\Loader;

use DMS\Filter\Mapping\Loader\AnnotationLoader as BaseAnnotationLoader,
    Doctrine\Common\Annotations\Reader,
    Doctrine\Common\Annotations\AnnotationRegistry;

/**
 * Extending the DMS\Filter\Mapping\Loader\AnnotationLoader in order to register the
 * PhpGag annotatations
 *
 * @author rdohms (https://github.com/rdohms/DMS)
 * @author Kpacha <kpacha666@gmail.com>
 */
class AnnotationLoader extends BaseAnnotationLoader
{

    public function __construct(Reader $reader)
    {
        parent::__construct($reader);

        //Register Required Annotation Namespaces
        $libFolder = __DIR__ . '/../../../../';
        AnnotationRegistry::registerAutoloadNamespace('Kpacha\PhpGag', $libFolder);
        AnnotationRegistry::registerAutoloadNamespace('PUGX\AOP', $libFolder . '../vendor/pugx/aop/src/');
    }

}
