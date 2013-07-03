<?php

namespace Kpacha\Tests\PhpGag\Aspects\Mocks;

use Kpacha\PhpGag\Aspects\ImaLetYouFinishBut\Annotation as ImaLetYouFinishBut;

class ImaLetYouFinishButMock
{
    private $_content = '';
    private $_intro = '';
    
    public function __construct($intro)
    {
        $this->_intro = $intro;
    }

    /**
     * @ImaLetYouFinishBut("introduce")
     */
    public function replay($speech)
    {
        $this->_content .=  $speech;
    }

    public function introduce()
    {
         $this->_content .= $this->_intro;
    }
    
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * @ImaLetYouFinishBut("unknown")
     */
    public function addSomeContent($speech)
    {
        $this->_content .=  $speech;
    }

}
