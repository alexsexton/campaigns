<?php

class Theme_Pagination_Test extends PHPUnit_Framework_TestCase
{
    use \Dxw\Iguana\Theme\Testing;

    public function setUp()
    {
        \WP_Mock::setUp();
    }

    public function tearDown()
    {
        \WP_Mock::tearDown();
    }

    public function testConstruct()
    {
        $helpers = $this->getHelpers(\Dxw\GdsCampaignRoot\Theme\Pagination::class, [
            'pagination' => 'pagination',
        ]);

        $pagination = new \Dxw\GdsCampaignRoot\Theme\Pagination($helpers);

        $this->assertFunctionsRegistered();
    }

    public function testPagination()
    {
        $pagination = new \Dxw\GdsCampaignRoot\Theme\Pagination($this->getHelpers());

        $this->markTestIncomplete();

        $pagination->pagination();
    }
}
