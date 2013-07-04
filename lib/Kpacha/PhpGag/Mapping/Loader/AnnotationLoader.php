<?php

namespace Kpacha\PhpGag\Mapping\Loader;

use DMS\Filter\Mapping\Loader\AnnotationLoader as BaseAnnotationLoader,
    Doctrine\Common\Annotations\Reader,
    Doctrine\Common\Annotations\AnnotationRegistry;

/**
 * Extending the DMS\Filter\Mapping\Loader\AnnotationLoader in order to register the
 * PhpGag annotated rules
 *
 * @author rdohms (https://github.com/rdohms/DMS)
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
