<?php

namespace Kpacha\PhpGag\CodeReview\Synthesis;

use \CbErrorCheckstyle;

/**
 * Description of CbDataGAG
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class CbErrorGAG extends CbErrorCheckstyle
{
    /**
     * Name of this plugin.
     * Used to read issues from XML.
     * @var String
     */
    public $pluginName = 'phpgag';

    /**
     * Default string to use as source for issue.
     * @var String
     */
    protected $_source = 'PHP-GAG';
}
