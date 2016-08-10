<?php

class Theme_Helpers_Test extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        \WP_Mock::setUp();
    }

    public function tearDown()
    {
        \WP_Mock::tearDown();
    }

    public function testRegister()
    {
        $helpers = new \Dxw\GdsCampaignRoot\Theme\Helpers();

        $this->assertInstanceOf(\Dxw\Iguana\Registerable::class, $helpers);

        \WP_Mock::expectActionAdded('wp_footer', [$helpers, 'wpFooter']);

        $helpers->register();
    }

    public function testWpFooter()
    {
        
    }
}
