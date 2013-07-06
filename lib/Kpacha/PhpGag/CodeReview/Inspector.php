<?php

namespace Kpacha\PhpGag\CodeReview;

use Doctrine\Common\Annotations\Reader;

class Inspector implements InspectorInterface
{

    /**
     * @var Reader
     */
    protected $annotationReader;
    protected $tokens = array();

    public function __construct(Reader $reader)
    {
        $this->annotationReader = $reader;
    }

    public function inspect($file)
    {
        if(!is_file($file) || !is_readable($file)) {
            throw new \Exception("Can't inspect $file");
        }
        $inspection = array();
        $namespace = $this->getNamespace($file);
        foreach ($this->getClassNames($file) as $classToInspect) {
            $className = $namespace . '\\' . $classToInspect;
            require_once $file;
            $inspection[$className] = $this->inspectClass($className);
        }
        return $inspection;
    }

    protected function inspectClass($classToInspect)
    {
        $class = new \ReflectionClass($classToInspect);
        $result = new AnalysisResult;
        $result->setClassAnnotations($this->annotationReader->getClassAnnotations($class));
        foreach ($class->getMethods() as $method) {
            $result->addMethodAnnotations($method->name,
                    $this->annotationReader->getMethodAnnotations($method));
        }
        foreach ($class->getProperties() as $property) {
            $result->addPropertyAnnotations($property->name,
                    $this->annotationReader->getPropertyAnnotations($property));
        }
        return $result;
    }

    protected function getTokens($file)
    {
        if (!isset($this->tokens[$file])) {
            $this->tokens[$file] = token_get_all(file_get_contents($file));
        }
        return $this->tokens[$file];
    }

    protected function getNamespace($file)
    {
        $tokens = $this->getTokens($file);
        $namespace = '';
        foreach ($tokens as $pos => $token) {
            if (is_array($token) && $token[0] == T_NAMESPACE) {
                for ($i = $pos + 2;
                            is_array($tokens[$i]) && ($tokens[$i][0] == T_STRING || $tokens[$i][0] == T_NS_SEPARATOR);
                            $i++) {
                    $namespace .= $tokens[$i][1];
                }
                break;
            }
        }
        return $namespace;
    }

    protected function getClassNames($file)
    {
        $tokens = $this->getTokens($file);
        $classNames = array();
        $classToken = false;
        foreach ($tokens as $token) {
            if (!is_array($token))
                continue;
            if ($token[0] == T_CLASS) {
                $classToken = true;
            } else if ($classToken && $token[0] == T_STRING) {
                $classNames[] = $token[1];
                $classToken = false;
            }
        }
        return $classNames;
    }

}
