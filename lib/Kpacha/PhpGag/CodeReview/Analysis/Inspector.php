<?php

namespace Kpacha\PhpGag\CodeReview\Analysis;

use Doctrine\Common\Annotations\Reader;
use \PHPParser_Lexer;
use \PHPParser_Parser;
use \PHPParser_Node_Stmt_Namespace;
use \PHPParser_Node_Stmt_Class;
use \PHPParser_Node_Stmt_ClassMethod;
use \PHPParser_Node_Stmt_PropertyProperty;
use \ReflectionClass;
use Kpacha\PhpGag\CodeReview\CodeReviewException;

class Inspector implements InspectorInterface
{

    /**
     * @var Reader
     */
    protected $annotationReader;

    public function __construct(Reader $reader)
    {
        $this->annotationReader = $reader;
    }

    public function inspect($file)
    {
        $inspection = array();
        foreach ($this->getChildren($this->parse($file), '\PHPParser_Node_Stmt_Namespace') as $namespace) {
            $inspection = array_merge($inspection, $this->inspectClasses($namespace));
        }
        return $inspection;
    }

    protected function inspectClasses(PHPParser_Node_Stmt_Namespace $namespace)
    {
        $inspection = array();
        foreach ($this->getChildren($namespace, '\PHPParser_Node_Stmt_Class') as $class) {
            $className = $namespace->name . '\\' . $class->name;
            $inspection[$className] = $this->inspectClass($class, $className);
        }
        return $inspection;
    }

    protected function inspectClass(PHPParser_Node_Stmt_Class $class, $className)
    {
        $reflClass = new ReflectionClass('\\' . $className);
        $result = new AnalysisResult;
        $result->setClassAnnotations($this->createDescriptions($class->getLine(),
                        $this->annotationReader->getClassAnnotations($reflClass)));
        $result->setMethodAnnotations($this->inspectMethods($class, $reflClass));
        $result->setPropertyAnnotations($this->inspectProperties($class, $reflClass));
        return $result;
    }

    protected function inspectMethods(PHPParser_Node_Stmt_Class $class, ReflectionClass $reflClass)
    {
        $inspection = array();
        foreach ($this->getChildren($class, '\PHPParser_Node_Stmt_ClassMethod') as $method) {
            $inspection[$method->name] = $this->inspectMethod($method, $reflClass);
        }
        return $inspection;
    }

    protected function inspectMethod(PHPParser_Node_Stmt_ClassMethod $method, ReflectionClass $reflClass)
    {
        return $this->createDescriptions(
                        $method->getLine(),
                        $this->annotationReader->getMethodAnnotations($reflClass->getMethod($method->name))
        );
    }

    protected function inspectProperties(PHPParser_Node_Stmt_Class $class, ReflectionClass $reflClass)
    {
        $inspection = array();
        foreach ($this->getChildren($class, '\PHPParser_Node_Stmt_Property') as $stmt) {
            foreach ($this->getChildren($stmt, '\PHPParser_Node_Stmt_PropertyProperty') as $property) {

                if (!$property->name) {
                    throw new CodeReviewException(print_r($property, 1));
                }
                $inspection[$property->name] = $this->inspectProperty($property, $reflClass);
            }
        }
        return $inspection;
    }

    protected function inspectProperty(PHPParser_Node_Stmt_PropertyProperty $property, ReflectionClass $reflClass)
    {
        return $this->createDescriptions(
                        $property->getLine(),
                        $this->annotationReader->getPropertyAnnotations($reflClass->getProperty($property->name))
        );
    }

    protected function parse($file)
    {
        require_once $file;
        $parser = new PHPParser_Parser(new PHPParser_Lexer);
        return $parser->parse(file_get_contents($file));
    }

    protected function getChildren($stmt, $type = 'PHPParser_Node_Stmt')
    {
        $children = array();
        foreach ($stmt as $child) {
            if ($child instanceof $type) {
                $children[] = $child;
            } else if (is_array($child)) {
                $children = array_merge($children, $this->getChildren($child, $type));
            }
        }
        return $children;
    }

    protected function createDescriptions($line, array $annotations)
    {
        $descriptions = array();
        foreach ($annotations as $annotation) {
            $descriptions[] = $this->createDescription($line, $annotation);
        }
        return $descriptions;
    }

    protected function createDescription($line, $annotation)
    {
        return new Description($line, $annotation);
    }

}
