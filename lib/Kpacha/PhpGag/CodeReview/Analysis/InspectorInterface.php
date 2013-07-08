<?php

namespace Kpacha\PhpGag\CodeReview\Analysis;

interface InspectorInterface
{
    public function inspect($file);
}