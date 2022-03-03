<?php
$page_session = \Codeigniter\Config\Services::session();

echo $page_session->getTempdata('success');
echo $page_session->getTempdata('error');

?>
<h1>hello</h1>
<table>
    <?php if (isset($validation)) : ?>
        <?= $validation->listErrors(); ?>
    <?php endif; ?>
    <?= form_open('welcome/myform') ?>
    <tr>
        <td>Name</td>
        <td>
            <?= form_input(['name' => 'username', 'placeholder' => 'Enter Username', 'value' => set_value('username')]); ?>
            <?= display_error($validation, 'username') ?>
        </td>
    </tr>
    <tr>
        <td>Email</td>
        <td>
            <?= form_input(['name' => 'email', 'placeholder' => 'Enter Email Id', 'value' => set_value('email')]); ?>
            <?= display_error($validation, 'email') ?>
        </td>
    </tr>
    <tr>
        <td>Password</td>
        <td>
            <?= form_input(['name' => 'password', 'placeholder' => 'Enter Password', 'value' => set_value('password')]); ?>
            <?= display_error($validation, 'password') ?>
        </td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td>
            <?= form_input(['name' => 'phone_number', 'placeholder' => 'Enter Phone Number', 'value' => set_value('phone_number')]); ?>
            <?= display_error($validation, 'phone_number') ?>
        </td>
    </tr>
    <tr>
        <td>Message</td>
        <td>
            <?= form_textarea(['name' => 'message', 'placeholder' => 'Enter Phone Number', 'rows' => 8, 'value' => set_value('message')]); ?>
            <?= display_error($validation, 'message') ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?= form_submit(['name' => 'send', 'value' => 'Submit']); ?>
            <?= form_reset(['value' => 'Clear']); ?>
        </td>
    </tr>
</table>