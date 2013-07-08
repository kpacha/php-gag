<?php

namespace Kpacha\PhpGag\CodeReview;

use Doctrine\Common\Annotations\Reader;
use Kpacha\PhpGag\CodeReview\Analysis\AnalyzerInterface;
use Kpacha\PhpGag\Mapping\Loader\AnnotationLoader;

class CodeReview
{

    /**
     * @var AnalyzerInterface
     */
    protected $_analyzer;

    /**
     * @var Reader
     */
    protected $_reader;
    protected $_logPath;
    protected $_sourcePath;
    protected $_outputPath;

    public function __construct(Reader $reader, $logPath, $sourcePath, $outputPath)
    {
        //Load AnnotationLoader
        new AnnotationLoader($reader);
        $this->_reader = $reader;
        $this->_logPath = $logPath;
        $this->_sourcePath = (array) $sourcePath;
        $this->_outputPath = $outputPath;
    }

    /**
     * Lazy instantiation of the alayzer
     *
     * @return AnalyzerInterface
     */
    protected function analyzer()
    {
        if (!$this->_analyzer) {
            $this->_analyzer = CodeReviewFactory::createAnalyzer(
                            CodeReviewFactory::createInspector($this->_reader),
                            CodeReviewFactory::createReporter($this->_logPath)
            );
        }
        return $this->_analyzer;
    }

    public function analyze()
    {
        foreach ((array) $this->_sourcePath as $folder) {
            $this->analyzer()->addFolder($folder);
        }
        $this->analyzer()->compile();
        return $this;
    }

    public function report()
    {
        $controller = CodeReviewFactory::createBrowser(
                        $this->_logPath, $this->_sourcePath, $this->_outputPath
        );

        $controller->addErrorPlugins('\Kpacha\PhpGag\CodeReview\Synthesis\CbErrorGAG');

        try {
            $controller->run();
        } catch (Exception $e) {
            throw new CodeReviewException($e->getMessage());
        }
    }

}
