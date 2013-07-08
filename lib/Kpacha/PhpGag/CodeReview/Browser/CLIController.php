<?php

namespace Kpacha\PhpGag\CodeReview\Browser;

use \CbCLIController;

class CLIController extends CbCLIController
{

    /**
     * Returns a list of available plugins.
     *
     * Currently hard-coded.
     *
     * @return array of string Classnames of error plugins
     */
    public static function getAvailablePlugins()
    {
        $availablePlugins = parent::getAvailablePlugins();
        $availablePlugins[] = '\Kpacha\PhpGag\CodeReview\Browser\CbDataGAG';
        return $availablePlugins;
    }

}

