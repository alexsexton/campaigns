<?php

class ApplicationForm_Form_Test extends PHPUnit_Framework_TestCase
{
    use \Dxw\Iguana\Theme\Testing;

    public function setUp()
    {
        \WP_Mock::setUp();

        \WP_Mock::wpFunction('esc_html', [
            'return' => function ($a) {
                return '_'.$a.'_';
            },
        ]);

        \WP_Mock::wpFunction('esc_attr', [
            'return' => function ($a) {
                return '-'.$a.'-';
            },
        ]);
    }

    public function tearDown()
    {
        \WP_Mock::tearDown();
    }

    private function getPost(array $__post)
    {
        return new \Dxw\Iguana\Value\Post($__post);
    }

    private function getGet(array $__get)
    {
        return new \Dxw\Iguana\Value\Get($__get);
    }

    private function getServer(string $requestMethod='POST')
    {
        return new \Dxw\Iguana\Value\Server([
            'REQUEST_METHOD' => $requestMethod,
        ]);
    }

    private function getStorage()
    {
        $stub = $this->createMock(\Dxw\GdsCampaignRoot\ApplicationForm\Storage::class);

        return $stub;
    }

    private function getMailer()
    {
        $stub = $this->createMock(\Dxw\GdsCampaignRoot\ApplicationForm\Mailer::class);

        return $stub;
    }

    public function testConstruct()
    {
        $helpers = $this->getHelpers(\Dxw\GdsCampaignRoot\ApplicationForm\Form::class, [
            'applicationForm' => 'applicationForm',
        ]);

        new \Dxw\GdsCampaignRoot\ApplicationForm\Form($helpers, $this->getPost([]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $this->assertFunctionsRegistered();
    }

    public function testRegister()
    {
        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $this->assertInstanceOf(\Dxw\Iguana\Registerable::class, $form);

        \WP_Mock::expectActionAdded('init', [$form, 'init']);
        \WP_Mock::expectActionAdded('template_redirect', [$form, 'templateRedirect']);

        $form->register();
    }

    public function testApplicationForm()
    {
        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'test',
                        'key' => 'aaa',
                    ],
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Government department',
                        'parent' => 'aaa',
                    ],
                    [
                        'label' => 'Name',
                        'name' => 'name',
                        'parent' => 'bbb',
                        'type' => 'text',
                        'instructions' => 'hi there',
                    ],
                    [
                        'label' => 'Government department',
                        'name' => 'department',
                        'parent' => 'bbb',
                        'type' => 'text',
                    ],
                    [
                        'label' => 'Email address',
                        'name' => 'email',
                        'parent' => 'bbb',
                        'type' => 'email',
                    ],
                    [
                        'label' => 'Description',
                        'name' => 'descr',
                        'parent' => 'bbb',
                        'type' => 'textarea',
                    ],
                    [
                        'label' => 'Deadline',
                        'name' => 'deadline',
                        'parent' => 'bbb',
                        'type' => 'date_picker',
                    ],
                ],
            ],
        ]);

        ob_start();
        $form->applicationForm();
        $output = ob_get_clean();

        $this->assertRegExp('&<form method="POST" class="data-collection">&s', $output);
        $this->assertRegExp('&</form>&s', $output);
        $this->assertRegExp('&<input type="submit" value="Submit application" class="button">&s', $output);

        $this->assertRegExp('&<label>.*_Name_.*</label><input type="text" name="-appform_name-" +required>.*_hi there_.*&s', $output);
        $this->assertRegExp('&<label for="-appform_department-" >.*_Government department_.*</label><input type="text" name="-appform_department-" +required>.*.*&s', $output);
        $this->assertRegExp('&<label for="-appform_email-" >.*_Email address_.*</label><input type="email" name="-appform_email-" +required pattern="'.preg_quote('.*@(.+\.)?gov\.uk').'">.*.*&s', $output);
        $this->assertRegExp('&<label for="-appform_descr-" >.*_Description_.*</label><textarea name="-appform_descr-" +required></textarea>.*.*&s', $output);
        $this->assertRegExp('&<label for="-appform_deadline-" >.*_Deadline_.*</label><input type="date" name="-appform_deadline-" +required>.*&s', $output);
    }

    public function testApplicationFormSuccessTrue()
    {
        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([
            'success' => 'true',
        ]));

        ob_start();
        $form->applicationForm();
        $output = ob_get_clean();

        // Negative match
        $this->assertRegExp('&^((?!<form).)*$&s', $output);

        $this->assertRegExp('&Thanks for submitting the form&s', $output);
    }

    public function testInit()
    {
        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Name',
                        'name' => 'name',
                        'parent' => 'bbb',
                        'type' => 'text',
                        'instructions' => 'hi there',
                    ],
                    [
                        'label' => 'Email address',
                        'name' => 'email',
                        'parent' => 'bbb',
                        'type' => 'email',
                    ],
                ],
            ],
        ]);

        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([
            'appform_name' => '',
            'appform_email' => 'a@b.gov.uk',
            'appform_unknown_field' => 'abc',
        ]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $form->init();

        $this->assertEquals([
            'name' => '',
            'email' => 'a@b.gov.uk',
        ], $form->data);
    }

    public function testInitIgnoreArrays()
    {
        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Name',
                        'name' => 'name',
                        'parent' => 'bbb',
                        'type' => 'text',
                        'instructions' => 'hi there',
                    ],
                ],
            ],
        ]);

        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([
            'appform_name' => ['hi there'],
        ]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $form->init();

        $this->assertEquals([
            'name' => '',
        ], $form->data);
    }

    public function testPersistedValues()
    {
        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Name',
                        'name' => 'name',
                        'parent' => 'bbb',
                        'type' => 'text',
                        'instructions' => 'hi there',
                    ],
                    [
                        'label' => 'Email address',
                        'name' => 'email',
                        'parent' => 'bbb',
                        'type' => 'email',
                    ],
                    [
                        'label' => 'Date field',
                        'name' => 'date',
                        'parent' => 'bbb',
                        'type' => 'date_picker',
                    ],
                    [
                        'label' => 'Text field',
                        'name' => 'text',
                        'parent' => 'bbb',
                        'type' => 'textarea',
                    ],
                ],
            ],
        ]);

        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $form->data = [
            'name' => 'John Smith',
            'email' => 'johnsmith@gov.uk',
            'date' => '2016-06-28',
            'text' => 'foobar',
        ];

        ob_start();
        $form->applicationForm();
        $output = ob_get_clean();

        $this->assertRegExp('&<input type="text" name="-appform_name-" value="-John Smith-" required>&s', $output);
        $this->assertRegExp('&<input type="email" name="-appform_email-" value="-johnsmith@gov.uk-" required&s', $output);
        $this->assertRegExp('&<input type="date" name="-appform_date-" value="-2016-06-28-" required>&s', $output);
        $this->assertRegExp('&<textarea name="-appform_text-" required rows="8">_foobar_</textarea>&s', $output);
    }

    public function testInitEmptyFields()
    {
        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Name',
                        'name' => 'text',
                        'parent' => 'bbb',
                        'type' => 'text',
                        'instructions' => 'hi there',
                    ],
                    [
                        'label' => 'Email address',
                        'name' => 'email',
                        'parent' => 'bbb',
                        'type' => 'email',
                    ],
                    [
                        'label' => 'Date field',
                        'name' => 'date_picker',
                        'parent' => 'bbb',
                        'type' => 'date_picker',
                    ],
                    [
                        'label' => 'Text field',
                        'name' => 'textarea',
                        'parent' => 'bbb',
                        'type' => 'textarea',
                    ],
                ],
            ],
        ]);

        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([
            'appform_text' => '',
            'appform_email' => '',
            'appform_date_picker' => '',
            'appform_textarea' => '',
        ]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $form->init();

        $this->assertEquals([
            'text' => [
                'error' => true,
                'message' => 'This field cannot be empty',
            ],
            'email' => [
                'error' => true,
                'message' => 'This field cannot be empty',
            ],
            'date_picker' => [
                'error' => true,
                'message' => 'This field cannot be empty',
            ],
            'textarea' => [
                'error' => true,
                'message' => 'This field cannot be empty',
            ],
        ], $form->errors);
    }

    public function testInitBadDate()
    {
        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Date field',
                        'name' => 'date_picker',
                        'parent' => 'bbb',
                        'type' => 'date_picker',
                    ],
                ],
            ],
        ]);

        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([
            'appform_date_picker' => '20160628',
        ]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $form->init();

        $this->assertEquals([
            'date_picker' => [
                'error' => true,
                'message' => 'This field should be a date (i.e. 2016-06-28)',
            ],
        ], $form->errors);
    }

    public function testInitNotAnEmailAddress()
    {
        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Email',
                        'name' => 'email',
                        'parent' => 'bbb',
                        'type' => 'email',
                    ],
                ],
            ],
        ]);

        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([
            'appform_email' => 'johnsmithgovuk',
        ]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $form->init();

        $this->assertEquals([
            'email' => [
                'error' => true,
                'message' => 'This field should be an email address',
            ],
        ], $form->errors);
    }

    public function testInitEmailDoesNotEndWithGovUk()
    {
        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Email',
                        'name' => 'email',
                        'parent' => 'bbb',
                        'type' => 'email',
                    ],
                ],
            ],
        ]);

        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([
            'appform_email' => 'johnsmith@gov.co.uk.com',
        ]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $form->init();

        $this->assertEquals([
            'email' => [
                'error' => true,
                'message' => 'Should be a .gov.uk email address',
            ],
        ], $form->errors);
    }

    public function testInitEmailWithUnusualCharacters()
    {
        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Email',
                        'name' => 'email',
                        'parent' => 'bbb',
                        'type' => 'email',
                    ],
                ],
            ],
        ]);

        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([
            'appform_email' => 'meow@猫.gov.uk',
        ]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $form->init();

        // TODO: One day we might want to change this to support IDN domain names
        $this->assertEquals([
            'email' => [
                'error' => true,
                'message' => 'This field should be an email address',
            ],
        ], $form->errors);
    }

    public function testDisplayingErrors()
    {
        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Name',
                        'name' => 'name',
                        'parent' => 'bbb',
                        'type' => 'text',
                        'instructions' => 'hi there',
                    ],
                    [
                        'label' => 'Email address',
                        'name' => 'email',
                        'parent' => 'bbb',
                        'type' => 'email',
                    ],
                    [
                        'label' => 'Date field',
                        'name' => 'date',
                        'parent' => 'bbb',
                        'type' => 'date_picker',
                    ],
                    [
                        'label' => 'Text field',
                        'name' => 'text',
                        'parent' => 'bbb',
                        'type' => 'textarea',
                    ],
                ],
            ],
        ]);

        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $form->data = [
            'name' => 'John Smith',
            'email' => 'johnsmith@gov.uk',
            'date' => '2016-06-28',
            'text' => 'foobar',
        ];

        $form->errors = [
            'name' => [
                'error' => true,
                'message' => 'cat',
            ],
            'email' => [
                'error' => true,
                'message' => 'dog',
            ],
            'date' => [
                'error' => true,
                'message' => 'squirrel',
            ],
            'text' => [
                'error' => true,
                'message' => 'pangolin',
            ],
        ];

        ob_start();
        $form->applicationForm();
        $output = ob_get_clean();

        $this->assertRegExp('&<label class="form-error">.*name="-appform_name-".*_cat_&s', $output);
        $this->assertRegExp('&<label class="form-error">.*name="-appform_email-".*_dog_&s', $output);
        $this->assertRegExp('&<label class="form-error">.*name="-appform_date-".*_squirrel_&s', $output);
        $this->assertRegExp('&<label class="form-error">.*name="-appform_text-".*_pangolin_&s', $output);
    }

    public function testTemplateRedirect()
    {
        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Name',
                        'name' => 'name',
                        'parent' => 'bbb',
                        'type' => 'text',
                        'instructions' => 'hi there',
                    ],
                ],
            ],
        ]);

        $storage = $this->getStorage();

        $storage->expects($this->exactly(1))
        ->method('store')
        ->with([
            'name' => 'John Smith',
        ])
        ->willReturn(\Result\Result::ok(456));

        $mailer = $this->getMailer();

        $mailer->expects($this->exactly(1))
        ->method('notifyAdmins')
        ->with(456);

        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([]), $this->getServer(), $storage, $mailer, $this->getGet([]));

        $form->data = [
            'name' => 'John Smith',
        ];

        $form->errors = [
            'name' => null,
        ];

        \WP_Mock::wpFunction('wp_redirect', [
            'args' => ['?success=true', 303],
            'times' => 1,
        ]);

        $form->templateRedirect();
    }

    public function testTemplateRedirectWithErrors()
    {
        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Name',
                        'name' => 'name',
                        'parent' => 'bbb',
                        'type' => 'text',
                        'instructions' => 'hi there',
                    ],
                ],
            ],
        ]);

        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([]), $this->getServer(), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $form->data = [
            'name' => 'John Smith',
        ];

        $form->errors = [
            'name' => [
                'error' => true,
                'message' => 'oh no',
            ],
        ];

        \WP_Mock::wpFunction('wp_redirect', [
            'times' => 0,
        ]);

        $form->templateRedirect();
    }

    public function testTemplateRedirectNonPost()
    {
        \WP_Mock::wpFunction('acf_local', [
            'args' => [],
            'return' => (object) [
                'groups' => [
                    [
                        'title' => 'Application form',
                        'key' => 'bbb',
                    ],
                ],
                'fields' => [
                    [
                        'label' => 'Name',
                        'name' => 'name',
                        'parent' => 'bbb',
                        'type' => 'text',
                        'instructions' => 'hi there',
                    ],
                ],
            ],
        ]);

        $form = new \Dxw\GdsCampaignRoot\ApplicationForm\Form($this->getHelpers(), $this->getPost([]), $this->getServer('GET'), $this->getStorage(), $this->getMailer(), $this->getGet([]));

        $form->data = [];

        $form->errors = [];

        \WP_Mock::wpFunction('wp_redirect', [
            'times' => 0,
        ]);

        $form->templateRedirect();
    }
}
