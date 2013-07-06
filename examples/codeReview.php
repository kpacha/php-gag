<?php

require_once '../vendor/autoload.php';

use Kpacha\PhpGag\CodeReview\Analyzer,
    Kpacha\PhpGag\CodeReview\Inspector,
    Doctrine\Common\Annotations\AnnotationReader,
    Kpacha\PhpGag\Mapping\Loader\AnnotationLoader;

//Get Doctrine Reader
$reader = new AnnotationReader();

//Load AnnotationLoader
$enforcerLoader = new AnnotationLoader($reader);

//Get the analyser
$analyzer = new Analyzer(new Inspector($reader));

//Analyze you file
$analyzer->addFile('User.php')->compile();

var_dump($analyzer->getAnnotations());