<?php

class ApplicationForm_Storage_Test extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        \WP_Mock::setUp();
    }

    public function tearDown()
    {
        \WP_Mock::tearDown();
    }

    public function testStore()
    {
        $storage = new \Dxw\GdsCampaignRoot\ApplicationForm\Storage();

        \WP_Mock::wpFunction('wp_insert_post', [
            'args' => [[
                'post_type' => 'gds_application',
                'post_status' => 'publish',
            ]],
            'return' => 4,
            'times' => 1,
        ]);

        \WP_Mock::wpFunction('update_field', [
            'args' => ['name', 'John Smith', 4],
            'times' => 1,
        ]);

        \WP_Mock::wpFunction('update_field', [
            'args' => ['email', 'john@e.mail', 4],
            'times' => 1,
        ]);

        $result = $storage->store([
            'name' => 'John Smith',
            'email' => 'john@e.mail',
        ]);

        $this->assertFalse($result->isErr());
        $this->assertEquals(4, $result->unwrap());
    }
}
