<?php

namespace Kpacha\PhpGag\CodeReview;

interface AnalyzerInterface
{

    /**
     * Adds a file to the list of files to be inspected
     *
     * @param string $file
     */
    public function addFile($file);

    /**
     * Adds a folder to the list of folders to be inspected
     *
     * @param string $folder
     */
    public function addFolder($folder);

    /**
     * Do hard work! Inspect all the required files and folders
     */
    public function compile();

    /**
     * Get the list of analyzed annotations
     */
    public function getAnnotations();
}