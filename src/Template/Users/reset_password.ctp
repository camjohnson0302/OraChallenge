<h1>Forgot Password?</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('email') ?>
<?= $this->Form->button('Reset Password') ?>
<?= $this->Form->end() ?>

<?= $this->Html->link(__('Back to login'), ['action' => 'login']) ?>