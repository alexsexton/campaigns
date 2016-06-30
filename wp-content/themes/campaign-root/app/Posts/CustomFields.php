<?php

namespace Dxw\GdsCampaignRoot\Posts;

class CustomFields implements \Dxw\Iguana\Registerable
{
    public function register()
    {
        __DIR__ . '/CustomFieldGroups/Options.php';
        __DIR__ . '/CustomFieldGroups/ContentBlocks.php';
    }
}
