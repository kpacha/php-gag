<?php

namespace Kpacha\PhpGag\CodeReview;

use Kpacha\PhpGag\CodeReview\Analysis\Analyzer;
use Kpacha\PhpGag\CodeReview\Analysis\Inspector;
use Kpacha\PhpGag\CodeReview\Analysis\InspectorInterface;
use Kpacha\PhpGag\CodeReview\Analysis\Reporter;
use Kpacha\PhpGag\CodeReview\Analysis\ReporterInterface;
use Doctrine\Common\Annotations\Reader;
use \CbCLIController;
use \CbIOHelper;
use \Log;

class CodeReviewFactory
{

    public static function createAnalyzer(InspectorInterface $inspector, ReporterInterface $reporter)
    {
        return new Analyzer($inspector, $reporter);
    }

    public static function createReporter($path)
    {
        return new Reporter($path);
    }

    public static function createInspector(Reader $reader)
    {
        return new Inspector($reader);
    }

    public static function createBrowser($logPath, $sourcePath, $outputPath)
    {
        if (strpos('@php_dir@', '@php_dir') === 0) {
            require_once dirname(__FILE__) . '/../../../../vendor/mayflower/php-codebrowser/src/CLIController.php';
        } else {
            require_once '@php_dir@/PHP_CodeBrowser/CLIController.php';
        }
        return new CbCLIController(
                        $logPath,
                        (array)$sourcePath,
                        $outputPath,
                        array(),
                        array(),
                        array(),
                        new CbIOHelper(),
                        Log::factory('console', '', 'PHPCB'),
                        array('php'),
                        false
        );
    }

}