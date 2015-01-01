<?php

namespace Morannon\Tests\Base\Utils;

use Morannon\Base\Utils\UrlUtils;

class UrlUtilsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UrlUtils
     */
    private $urlUtils;

    private $baseUrl = 'my://own.base/url/';

    protected function setUp()
    {
        parent::setUp();

        $this->urlUtils = new UrlUtils();
    }

    public function testRemoveTrainingSlash()
    {
        $this->assertEquals('prefix/test', $this->urlUtils->removeTrainingSlash('prefix/test/'));
    }

    public function testBuildUrlStringReturnsNullOnEmptyBaseUrl()
    {
        $this->assertNull($this->urlUtils->buildUrlString(null, null));
    }

    public function testBuildUrlStringReturnsBaseUrlOnEmptyResource()
    {
        $this->assertEquals($this->baseUrl, $this->urlUtils->buildUrlString($this->baseUrl, null));
    }

    public function testBuildUrlStringBuildsCorrectUrlString()
    {
        $this->assertEquals('my://own.base/url/with/resource', $this->urlUtils->buildUrlString($this->baseUrl, '/with/resource'));
    }

    public function testParseNewLineSeparatedBodyReturnsCorrectArrayOnWindows()
    {
        $body = "id=1\r\nname=Hans\r\nauthor=Wurst";

        $result = $this->urlUtils->parseNewLineSeparatedBody($body);

        $this->assertTrue(is_array($result));
        $this->assertCount(3, $result);
        $this->assertArrayHasKey('id', $result);
        $this->assertEquals(1, $result['id']);
        $this->assertArrayHasKey('name', $result);
        $this->assertEquals("Hans", $result['name']);
        $this->assertArrayHasKey('author', $result);
        $this->assertEquals("Wurst", $result['author']);
    }
}
 