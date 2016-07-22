<?php

namespace Dxw\GdsCampaignRoot\ApplicationForm;

class Form implements \Dxw\Iguana\Registerable
{
    public $data;
    public $errors;

    private $govUkFormat = '/@(.+\\.)?gov\\.uk$/';
    // https://html.spec.whatwg.org/multipage/forms.html#valid-e-mail-address
    // type=email converts the domain to punycode automatically so we don't need to convert the domain portion to punycode
    private $emailFormat = '/^[a-zA-Z0-9.!#$%&\'*+\\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/';

    public function __construct(\Dxw\Iguana\Theme\Helpers $helpers, \Dxw\Iguana\Value\Post $__post, \Dxw\Iguana\Value\Server $__server, \Dxw\GdsCampaignRoot\ApplicationForm\Storage $storage, \Dxw\GdsCampaignRoot\ApplicationForm\Mailer $mailer, \Dxw\Iguana\Value\Get $__get)
    {
        $this->post = $__post;
        $this->server = $__server;
        $this->storage = $storage;
        $this->mailer = $mailer;
        $this->get = $__get;
        $helpers->registerFunction('applicationForm', [$this, 'applicationForm']);
        $this->data = [];
        $this->errors = [];
    }

    public function register()
    {
        add_action('init', [$this, 'init']);
        add_action('template_redirect', [$this, 'templateRedirect']);
    }

    private function getFields() : array
    {
        $group = null;
        foreach (\acf_local()->groups as $_group) {
            if ($_group['title'] === 'Application form') {
                $group = $_group;
                break;
            }
        }

        // TODO check if group is null

        $fields = [];

        foreach (\acf_local()->fields as $field) {
            if ($field['parent'] !== $group['key']) {
                continue;
            }

            $fields[] = $field;
        }

        return $fields;
    }

    private function name(array $field)
    {
        echo sprintf('name="%s"', esc_attr('appform_'.$field['name']));
    }

    private function value(array $field)
    {
        if (isset($this->data[$field['name']])) {
            echo sprintf('value="%s"', esc_attr($this->data[$field['name']]));
        }
    }

    private function valueTextarea(array $field)
    {
        if (isset($this->data[$field['name']])) {
            echo esc_html($this->data[$field['name']]);
        }
    }

    private function isError(array $field)
    {
        return isset($this->errors[$field['name']]['error']) && $this->errors[$field['name']]['error'];
    }

    private function errorAttributes(array $field)
    {
        if ($this->isError($field)) {
            echo 'class="form-error"';
        }
    }

    private function errorNotice(array $field)
    {
        if ($this->isError($field)) {
            echo esc_html($this->errors[$field['name']]['message']);
        }
    }

    public function applicationForm()
    {
        if (isset($this->get['success']) && $this->get['success'] === 'true') {
            ?>

            <p>Thanks for submitting the form.</p>

            <?php
            return;
        }

        ?>

        <form method="POST" class="data-collection">

        <?php foreach ($this->getFields() as $field) : ?>
            <div class="form-group">
                <label <?php $this->errorAttributes($field) ?>>
                <?php echo esc_html($field['label']) ?>
                <?php if (!empty($field['instructions'])) : ?>
                    <span class="hint"><?php echo esc_html($field['instructions']) ?></span>
                <?php endif ?>
                </label>

                <?php if ($field['type'] === 'email') : ?>
                    <input type="email" <?php $this->name($field) ?> <?php $this->value($field) ?> required pattern=".*@(.+\.)?gov\.uk">
                <?php elseif ($field['type'] === 'textarea') : ?>
                    <textarea <?php $this->name($field) ?> required rows="8"><?php $this->valueTextarea($field) ?></textarea>
                <?php elseif ($field['type'] === 'date_picker') : ?>
                    <input type="date" <?php $this->name($field) ?> <?php $this->value($field) ?> required>
                <?php else : ?>
                    <input type="text" <?php $this->name($field) ?> <?php $this->value($field) ?> required>
                <?php endif ?>

                <?php $this->errorNotice($field) ?>
            </div>
        <?php endforeach ?>

        <div class="form-buttons">
            <input type="submit" value="Submit Application" class="button">
        </div>

        </form>

        <?php

    }

    private function getValue(array $field)
    {
        if (isset($this->post['appform_'.$field['name']]) && is_string($this->post['appform_'.$field['name']])) {
            return $this->post['appform_'.$field['name']];
        } else {
            return '';
        }
    }

    private function getError(array $field)
    {
        $value = $this->data[$field['name']];

        if ($value === '') {
            return [
                'error' => true,
                'message' => 'This field cannot be empty',
            ];
        } elseif (
            $field['type'] === 'date_picker' &&
            preg_match('&^\d{4}-\d{2}-\d{2}$&', $value) !== 1
        ) {
            return [
                'error' => true,
                'message' => 'This field should be a date (i.e. 2016-06-28)',
            ];
        } elseif ($field['type'] === 'email' && preg_match($this->emailFormat, $value) !== 1) {
            return [
                'error' => true,
                'message' => 'This field should be an email address',
            ];
        } elseif ($field['type'] === 'email' && preg_match($this->govUkFormat, $value) !== 1) {
            return [
                'error' => true,
                'message' => 'Should be a .gov.uk email address',
            ];
        }

        return null;
    }

    public function init()
    {
        if ($this->server['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        foreach ($this->getFields() as $field) {
            $this->data[$field['name']] = $this->getValue($field);

            $this->errors[$field['name']] = $this->getError($field);
        }
    }

    public function templateRedirect()
    {
        if ($this->server['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        foreach ($this->errors as $error) {
            if (is_array($error) && $error['error']) {
                return;
            }
        }

        $result = $this->storage->store($this->data);

        $this->mailer->notifyAdmins($result->unwrap());

        return wp_redirect('?success=true', 303);
    }
}
