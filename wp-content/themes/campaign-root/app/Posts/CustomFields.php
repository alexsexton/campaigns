<?php

namespace Dxw\GdsCampaignRoot\Posts;

class CustomFields implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        require __DIR__ . '/CustomFieldGroups/Options.php';
        require __DIR__ . '/CustomFieldGroups/ContentBlocks.php';
    }
}
