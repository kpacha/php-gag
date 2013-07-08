<?php

namespace Kpacha\PhpGag\CodeReview;

class AnalysisResult
{

    protected $classAnnotations = array();
    protected $propertyAnnotations = array();
    protected $methodAnnotations = array();

    public function getClassAnnotations()
    {
        return $this->classAnnotations;
    }

    public function setClassAnnotations($classAnnotations)
    {
        $this->classAnnotations = $classAnnotations;
    }

    public function getPropertyAnnotations()
    {
        return $this->propertyAnnotations;
    }

    public function setPropertyAnnotations($propertyAnnotations)
    {
        if (is_array($propertyAnnotations) && count($propertyAnnotations)) {
            $this->propertyAnnotations = $propertyAnnotations;
        }
    }

    public function addPropertyAnnotations($property, $propertyAnnotations)
    {
        $this->propertyAnnotations[$property] = $propertyAnnotations;
    }

    public function getMethodAnnotations()
    {
        return $this->methodAnnotations;
    }

    public function setMethodAnnotations($methodAnnotations)
    {
        if (is_array($methodAnnotations) && count($methodAnnotations)) {
            $this->methodAnnotations = $methodAnnotations;
        }
    }

    public function addMethodAnnotations($method, $methodAnnotations)
    {
        $this->methodAnnotations[$method] = $methodAnnotations;
    }

}