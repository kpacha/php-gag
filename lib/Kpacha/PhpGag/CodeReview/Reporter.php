<?php

namespace Kpacha\PhpGag\CodeReview;

use \DOMDocument;

class Reporter implements ReporterInterface
{

    protected $_sourcePath;

    const ROOT_NODE = 'phpgag';
    const CLASS_LEVEL = 'class level';
    const PROPERTY_LEVEL = 'property';
    const METHOD_LEVEL = 'method';

    public function __construct($sourcePath)
    {
        $this->_sourcePath = $sourcePath;
    }

    public function report(array $results)
    {
        $document = $this->createDocument();
        $report = $document->createElement(static::ROOT_NODE);
        foreach ($results as $file => $classes) {
            $report->appendChild($this->createFileReportNode($document, $file, $classes));
        }
        $document->appendChild($report);
        return $document->save($this->getReportFileName());
    }

    protected function createDocument()
    {
        return new DOMDocument('1.0', 'UTF-8');
    }

    protected function getReportFileName()
    {
        return $this->_sourcePath . DIRECTORY_SEPARATOR . static::ROOT_NODE .'.xml';
    }

    protected function createFileReportNode(DOMDocument $document, $file, array $classes)
    {
        $fileReport = $document->createElement('file');
        $fileReport->setAttribute('name', $file);
        foreach ($classes as $className => $analysisResult) {
            foreach ($this->createClassDomNodes($document, $className, $analysisResult) as $node) {
                $fileReport->appendChild($node);
            }
        }
        return $fileReport;
    }

    protected function createClassDomNodes(DOMDocument $document, $className, AnalysisResult $analysis)
    {
        $nodes = array_merge(
                $this->createAnnotationDomNodes($document, $className, $analysis->getClassAnnotations(),
                        self::CLASS_LEVEL),
                $this->createClassComponentDomNodes($document, $analysis->getMethodAnnotations(), self::METHOD_LEVEL),
                $this->createClassComponentDomNodes($document, $analysis->getPropertyAnnotations(), self::PROPERTY_LEVEL)
        );
        return $nodes;
    }

    protected function createClassComponentDomNodes(DOMDocument $document, array $components, $level)
    {
        $nodes = array();
        foreach ($components as $component => $descriptions) {
            $nodes = array_merge(
                    $nodes, $this->createAnnotationDomNodes($document, $component, $descriptions, $level)
            );
        }
        return $nodes;
    }

    protected function createAnnotationDomNodes(DOMDocument $document, $component, array $descriptions, $level)
    {
        $nodes = array();
        foreach ($descriptions as $description) {
            $annotationClass = get_class($description->getAnnotation());
            $annotationNode = $document->createElement('annotation');
            $annotationNode->setAttribute('message',
                    "Annotation of type [$annotationClass] detected on $level [$component]");
            $annotationNode->setAttribute('line', $description->getLine());
            $annotationNode->setAttribute('severity', 'info');
            $nodes[] = $annotationNode;
        }
        return $nodes;
    }

}