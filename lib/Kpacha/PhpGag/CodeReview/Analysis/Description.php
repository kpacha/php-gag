<?php

namespace Kpacha\PhpGag\CodeReview\Analysis;

class Description
{

    protected $annotation;
    protected $line;

    public function __construct($line, $annotation)
    {
        $this->line = $line;
        $this->annotation = $annotation;
    }

    public function getAnnotation()
    {
        return $this->annotation;
    }

    public function setAnnotation($annotation)
    {
        $this->annotation = $annotation;
    }

    public function getLine()
    {
        return $this->line;
    }

    public function setLine($line)
    {
        $this->line = (int) $line;
    }

}