<?php

require_once '../vendor/autoload.php';

use Kpacha\PhpGag\CodeReview\Analyzer,
    Kpacha\PhpGag\CodeReview\Inspector,
    Doctrine\Common\Annotations\AnnotationReader,
    Kpacha\PhpGag\Mapping\Loader\AnnotationLoader;

//Get Doctrine Reader
$reader = new AnnotationReader();

//Load AnnotationLoader
new AnnotationLoader($reader);

//Get the analyser
$analyzer = new Analyzer(new Inspector($reader));

//Analyze you file
$analysis = $analyzer->addFile('User.php')->addFile('Dummy.php')->compile()->getAnnotations();

var_dump($analysis['User.php']['Example\User']);
var_dump($analysis['Dummy.php']['Example\Dummy']);