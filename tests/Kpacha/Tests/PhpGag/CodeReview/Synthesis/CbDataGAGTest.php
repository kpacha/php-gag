<?php

namespace Kpacha\Tests\PhpGag\CodeReview\Synthesis;

require_once PHPCB_TEST_DIR . '/../AbstractTests.php';
require_once PHPCB_SOURCE . '/File.php';
require_once PHPCB_SOURCE . '/Issue.php';
require_once PHPCB_SOURCE . '/IssueXml.php';

use Kpacha\PhpGag\CodeReview\Synthesis\CbDataGAG;

/**
 * Description of CbDataGAGTest
 *
 * @author Kpacha <kpacha666@gmail.com>
 */
class CbDataGAGTest extends \CbAbstractTests
{
    /**
     * The object to test.
     *
     * @var CbDataGAG
     */
    protected $_cbDataGAG;

    /**
     * The xml string to test the plugin against.
     *
     * @var String
     */
    protected $_testXml = <<<HERE
<?xml version="1.0" encoding="UTF-8"?>
<phpgag version="0.0.1">
 <file name="/some/file">
  <annotation line="117"
         column="32"
         severity="error"
         message="Message 1"
         source="Source3"/>
  <annotation line="121"
         column="88"
         severity="warning"
         message="Message 2"
         source="Source2"/>
 </file>
 <file name="/other/file">
  <annotation line="48"
         column="67"
         severity="error"
         message="Message 3"
         source="Source1"/>
 </file>
 <file name="/no/annotations">
 </file>
</phpgag>
HERE;

    /**
     * (non-PHPdoc)
     * @see tests/cbAbstractTests#setUp()
     */
    protected function setUp()
    {
        parent::setUp();
        $issueXML = new \CbIssueXML();
        $xml = new \DOMDocument('1.0', 'UTF-8');
        $xml->validateOnParse = true;
        $xml->loadXML($this->_testXml);
        $issueXML->addXMLFile($xml);
        $this->_cbDataGAG = new CbDataGAG($issueXML);
    }

    /**
     * Test getFilelist
     *
     * @return  void
     */
    public function test__getFilelist()
    {
        $expected = array(
            new \CbFile(
                '/some/file',
                array(
                    new \CbIssue(
                        '/some/file',
                        117,
                        117,
                        'PHP-GAG',
                        'Message 1',
                        'error'
                    ),
                    new \CbIssue(
                        '/some/file',
                        121,
                        121,
                        'PHP-GAG',
                        'Message 2',
                        'warning'
                    )
                )
            ),
            new \CbFile(
                '/other/file',
                array(
                    new \CbIssue(
                        '/other/file',
                        48,
                        48,
                        'PHP-GAG',
                        'Message 3',
                        'error'
                    )
                )
            ),
            new \CbFile(
                '/no/annotations',
                array()
            )
        );
        $actual = $this->_cbDataGAG->getFilelist();
        $this->assertEquals($expected, $actual);
    }
}
