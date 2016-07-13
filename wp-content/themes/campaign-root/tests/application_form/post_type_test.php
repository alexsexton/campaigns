<?php

class ApplicationForm_PostType_Test extends PHPUnit_Framework_TestCase
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
        $postType = new \Dxw\GdsCampaignRoot\ApplicationForm\PostType();

        $this->assertInstanceOf(\Dxw\Iguana\Registerable::class, $postType);

        \WP_Mock::wpFunction('register_post_type', [
            'args' => [
                'gds_application',
                [
                    'public' => false,
                    'show_ui' => true,
                    'show_in_menu' => true,
                    'labels' => [
                        'name' => 'Applications',
                        'singular_name' => 'Application',
                    ],
                    'supports' => false,
                ],
            ],
            'times' => 1,
        ]);

        $postType->register();
    }
}
