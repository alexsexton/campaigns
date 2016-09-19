<?php

namespace Dxw\GdsCampaignRoot;

use Dxw\Iguana\Registerable;

class RolesAndCapabilities implements Registerable
{
    private $redundantRoles = ['subscriber', 'author'];

    public function register()
    {
        add_action('init', [$this, 'removeRedundantRoles']);
        add_action('init', [$this, 'allowContributorsToAddPages']);
    }

    public function removeRedundantRoles()
    {
        foreach ($this->redundantRoles as $role) {
            remove_role($role);
        }
    }

    public function allowContributorsToAddPages()
    {
        $role = get_role('contributor');
        if ($role !== null) {
            $role->add_cap('edit_pages');
            $role->add_cap('delete_pages');
        }
    }
}
