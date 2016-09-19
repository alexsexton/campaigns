<?php

describe(\Dxw\GdsCampaignRoot\RolesAndCapabilities::class, function () {
    beforeEach(function () {
        \WP_Mock::setUp();
        $this->rolesAndCapabilites = new \Dxw\GdsCampaignRoot\RolesAndCapabilities();
    });

    afterEach(function () {
        \WP_Mock::tearDown();
        \Mockery::close();
    });

    describe('->__construct()', function () {
        it('is registerable', function () {
            expect($this->rolesAndCapabilites)->to->be->instanceof(\Dxw\Iguana\Registerable::class);
        });
    });

    describe('->register()', function () {
        it('adds the actions', function () {
            \WP_Mock::expectActionAdded('init', [$this->rolesAndCapabilites, 'removeRedundantRoles']);
            \WP_Mock::expectActionAdded('init', [$this->rolesAndCapabilites, 'allowContributorsToAddPages']);
            $this->rolesAndCapabilites->register();
        });
    });

    describe('->removeRedundantRoles()', function () {
        it('removes redundant roles', function () {
            \WP_Mock::wpFunction('remove_role', [
                'args' => 'subscriber',
                'times' => 1
            ]);
            \WP_Mock::wpFunction('remove_role', [
                'args' => 'author',
                'times' => 1
            ]);
            $this->rolesAndCapabilites->removeRedundantRoles();
        });

    });


    describe('->allowContributorsToAddPages()', function () {
        it('allows contributors to add pages', function () {
            $role = Mockery::mock(WP_Role::class, function ($mock) {
                $mock->shouldReceive('add_cap')
                    ->withArgs(['edit_pages'])
                    ->times(1);
                $mock->shouldReceive('add_cap')
                    ->withArgs(['delete_pages'])
                    ->times(1);
            });
            \WP_Mock::wpFunction('get_role', [
                'args' => 'contributor',
                'return' => $role
            ]);
            $this->rolesAndCapabilites->allowContributorsToAddPages();
        });

        it('doesnt fail when the role doesnt exist', function () {
            \WP_Mock::wpFunction('get_role', [
                'args' => 'contributor',
                'return' => null
            ]);
            $this->rolesAndCapabilites->allowContributorsToAddPages();
        });
    });
});
