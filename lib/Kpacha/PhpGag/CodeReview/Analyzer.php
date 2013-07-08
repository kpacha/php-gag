<?php

namespace Kpacha\PhpGag\CodeReview;

class Analyzer implements AnalyzerInterface
{

    protected $filesToScan = array();
    protected $foldersToScan = array();
    protected $annotations = array();

    /**
     * @var InspectorInterface
     */
    protected $inspector = null;

    /**
     * @var ReporterInterface
     */
    protected $reporter = null;

    public function __construct(InspectorInterface $inspector, ReporterInterface $reporter)
    {
        $this->inspector = $inspector;
        $this->reporter = $reporter;
    }

    public function addFile($file)
    {
        $this->filesToScan[$file] = null;
        return $this;
    }

    public function addFolder($folder)
    {
        $this->foldersToScan[$folder] = null;
        return $this;
    }

    public function compile()
    {
        foreach ($this->getFilesToScan() as $file) {
            if ($this->shouldBeInspected($file)) {
                $this->annotations[$file] = $this->inspector->inspect($file);
            }
        }
        if ($this->reporter->report($this->annotations) === false) {
            throw new CodeReviewException('Writting down the report!');
        }
        return $this;
    }

    public function shouldBeInspected($file)
    {
        return preg_match('/[\.php]$/', $file);
    }

    public function getAnnotations()
    {
        return $this->annotations;
    }

    protected function getFilesToScan()
    {
        $filesToScan = $this->filesToScan;
        foreach (array_keys($this->foldersToScan) as $folder) {
            foreach ($this->getFilenamesFromFolder($folder) as $file) {
                $filesToScan[$file] = null;
            }
        }
        return array_keys($filesToScan);
    }

    protected function getFilenamesFromFolder($folder)
    {
        $files = array();
        $iterator = new \RecursiveIteratorIterator(
                        new \RecursiveDirectoryIterator($folder), \RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($iterator as $name => $object) {
            if (!preg_match('/[\/\.|\/\.\.]$/', $name) && !$object->isDir()) {
                $files[] = $name;
            }
        }
        return $files;
    }

}
