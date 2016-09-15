<?php

namespace Dxw\GdsCampaignRoot\Wizard;

class Page implements \Dxw\Iguana\Registerable
{
    public function __construct(\Dxw\Iguana\Value\Post $__post)
    {
        $this->post = $__post;
    }

    public function register()
    {
        add_action('admin_menu', [$this, 'adminMenu']);
        add_action('wp_ajax_campaigns_wizard_set', [$this, 'wpAjax']);
    }

    public function adminMenu()
    {
        add_submenu_page('tools.php', 'Set up analytics', 'Set up analytics', 'activate_plugins', 'wizard', [$this, 'callback']);
    }

    public function callback()
    {
        get_template_part('admin/wizard/page');
    }

    private function ajaxResponse(bool $error, string $message='')
    {
        $data = [
            'error' => $error,
        ];

        if (strlen($message) > 0) {
            $data['message'] = $message;
        }

        header('Content-type: application/json');
        echo json_encode($data);
        wp_die();
    }

    public function wpAjax()
    {
        if (!(isset($this->post['nonce']) && is_string($this->post['nonce']))) {
            return $this->ajaxResponse(true, 'nonce missing');
        }

        if (!(isset($this->post['campaigns_wizard_type']))) {
            return $this->ajaxResponse(true, 'type missing');
        }

        if (!($this->post['campaigns_wizard_type'] === 'ga' || $this->post['campaigns_wizard_type'] === 'gtm')) {
            return $this->ajaxResponse(true, 'type incorrect');
        }

        if (!wp_verify_nonce($this->post['nonce'], 'campaigns_wizard')) {
            return $this->ajaxResponse(true, 'invalid nonce');
        }

        if (!current_user_can('activate_plugins')) {
            return $this->ajaxResponse(true, 'user not permitted');
        }

        update_option('campaigns_'.$this->post['campaigns_wizard_type'].'_id', $this->post['campaigns_wizard_id']);

        return $this->ajaxResponse(false);
    }
}
