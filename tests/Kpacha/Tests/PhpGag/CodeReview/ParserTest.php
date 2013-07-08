<?php

namespace Kpacha\Tests\PhpGag\CodeReview;

use \PHPParser_Lexer;
use \PHPParser_Parser;
use \PHPUnit_Framework_TestCase as TestCase;

class ParserTest extends TestCase
{

    public function testParser()
    {
        $parser = new PHPParser_Parser(new PHPParser_Lexer);
        $stmts = $parser->parse(file_get_contents(TEST_BASE_DIR . '/../examples/Dummy.php'));
        
    }

}