<?php

class ApplicationForm_Mailer_Test extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        \WP_Mock::setUp();
    }

    public function tearDown()
    {
        \WP_Mock::tearDown();
    }

    public function testNotifyAdmins()
    {
        $mailer = new \Dxw\GdsCampaignRoot\ApplicationForm\Mailer();

        \WP_Mock::wpFunction('wp_mail', [
            'args' => ['admin@site.test', 'New application form submitted', 'New application form submitted: https://site.test/wp-admin/post.php?post_id=123'],
            'times' => 1,
        ]);

        \WP_Mock::wpFunction('wp_mail', [
            'args' => ['admin2@site.test', 'New application form submitted', 'New application form submitted: https://site.test/wp-admin/post.php?post_id=123'],
            'times' => 1,
        ]);

        \WP_Mock::wpFunction('get_super_admins', [
            'args' => [],
            'return' => ['admin1', 'admin2'],
        ]);

        \WP_Mock::wpFunction('get_user_by', [
            'args' => ['login', 'admin1'],
            'return' => (object) [
                'data' => (object) [
                    'user_email' => 'admin@site.test',
                ],
            ],
        ]);

        \WP_Mock::wpFunction('get_user_by', [
            'args' => ['login', 'admin2'],
            'return' => (object) [
                'data' => (object) [
                    'user_email' => 'admin2@site.test',
                ],
            ],
        ]);

        \WP_Mock::wpFunction('get_edit_post_link', [
            'args' => [456, 'not-pre-escaped'],
            'return' => 'https://site.test/wp-admin/post.php?post_id=123',
        ]);

        $mailer->notifyAdmins(456);
    }
}
