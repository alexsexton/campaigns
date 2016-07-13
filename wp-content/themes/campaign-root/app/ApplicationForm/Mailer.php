<?php

namespace Dxw\GdsCampaignRoot\ApplicationForm;

class Mailer
{
    public function notifyAdmins(int $postId)
    {
        foreach (get_super_admins() as $adminLogin) {
            $admin = get_user_by('login', $adminLogin);

            $subject = 'New application form submitted';
            $body = sprintf('New application form submitted: %s', get_edit_post_link($postId, 'not-pre-escaped'));
            wp_mail($admin->data->user_email, $subject, $body);
        }
    }
}
