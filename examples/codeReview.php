<?php

require_once '../vendor/autoload.php';

use Kpacha\PhpGag\CodeReview\CodeReview;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

$logPath = __DIR__ . DIRECTORY_SEPARATOR . 'log';
$sourcePath = realpath(__DIR__ . '/../tests/Kpacha/Tests/PhpGag/Aspects/Mocks');

// Register foreign annotations
AnnotationRegistry::registerFile('NonGAGAnnotation.php');

$codeReview = new CodeReview(new AnnotationReader(), $logPath, $sourcePath, __DIR__ . '/output');
$codeReview->analyze()->report();