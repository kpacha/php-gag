<?php

require_once '../vendor/autoload.php';

use Kpacha\PhpGag\CodeReview\Analyzer,
    Kpacha\PhpGag\CodeReview\Inspector,
    Kpacha\PhpGag\CodeReview\Reporter,
    Doctrine\Common\Annotations\AnnotationReader,
    Kpacha\PhpGag\Mapping\Loader\AnnotationLoader,
    Kpacha\PhpGag\CodeReview\Browser\CLIController;
use Doctrine\Common\Annotations\AnnotationRegistry;

$logPath = __DIR__ . DIRECTORY_SEPARATOR . 'log';
$sourcePath = realpath(__DIR__ . '/../tests/Kpacha/Tests/PhpGag/Aspects/Mocks');

//Get Doctrine Reader
$reader = new AnnotationReader();
AnnotationRegistry::registerFile('NonGAGAnnotation.php');

//Load AnnotationLoader
new AnnotationLoader($reader);

//Get the analyser
$analyzer = new Analyzer(new Inspector($reader), new Reporter($logPath));

//Analyze your files
$analyzer
        ->addFolder($sourcePath)
        ->compile()
;

if (strpos('@php_dir@', '@php_dir') === 0) {
    require_once dirname(__FILE__) . '/../vendor/mayflower/php-codebrowser/src/CLIController.php';
} else {
    require_once '@php_dir@/PHP_CodeBrowser/CLIController.php';
}
$controller = new CLIController(
                $logPath,
                array($sourcePath),
                __DIR__ . '/output',
                array(),
                array(),
                array(),
                new CbIOHelper(),
                Log::factory('console', '', 'PHPCB'),
                array('php'),
                false
);

$controller->addErrorPlugins(CLIController::getAvailablePlugins());

try {
    $controller->run();
} catch (Exception $e) {
    error_log(
            <<<HERE
[Error] {$e->getMessage()}

{$e->getTraceAsString()}
HERE
    );
}