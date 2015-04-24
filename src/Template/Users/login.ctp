<form method="post" action="/users/login" enctype="multipart/form-data">
<fieldset>
    <legend><?= __('Add User') ?></legend>
    <?php
        echo $this->Form->input('email');
        echo $this->Form->input('password');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>


<?= $this->Html->link(__('Forgot Password?'), ['action' => 'resetPassword']) ?>