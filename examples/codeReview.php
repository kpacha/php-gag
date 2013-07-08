<?php

require_once '../vendor/autoload.php';

use Kpacha\PhpGag\CodeReview\CodeReview,
    Doctrine\Common\Annotations\AnnotationReader,
    Kpacha\PhpGag\Mapping\Loader\AnnotationLoader;
use Doctrine\Common\Annotations\AnnotationRegistry;

$logPath = __DIR__ . DIRECTORY_SEPARATOR . 'log';
$sourcePath = realpath(__DIR__ . '/../tests/Kpacha/Tests/PhpGag/Aspects/Mocks');

//Get Doctrine Reader
$reader = new AnnotationReader();
AnnotationRegistry::registerFile('NonGAGAnnotation.php');


$codeReview = new CodeReview($reader, $logPath, $sourcePath, __DIR__ . '/output');
$codeReview->analyze()->report();