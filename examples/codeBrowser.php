<?php

require_once '../vendor/autoload.php';

if (strpos( '@php_dir@', '@php_dir' ) === 0) {
    require_once dirname( __FILE__ ) . '/../vendor/mayflower/php-codebrowser/src/CLIController.php';
} else {
    require_once '@php_dir@/PHP_CodeBrowser/CLIController.php';
}

\Kpacha\PhpGag\CodeReview\Browser\CLIController::main();
