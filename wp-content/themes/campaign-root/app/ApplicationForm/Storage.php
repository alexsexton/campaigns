<?php

namespace Dxw\GdsCampaignRoot\ApplicationForm;

class Storage
{
    public function store(array $data) : \Result\Result
    {
        $id = wp_insert_post([
            'post_type' => 'gds_application',
            'post_status' => 'publish',
        ]);

        foreach ($data as $k => $v) {
            update_field($k, $v, $id);
        }

        return \Result\Result::ok($id);
    }
}
