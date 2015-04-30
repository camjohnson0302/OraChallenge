<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Chats'), ['controller' => 'Chats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chat'), ['controller' => 'Chats', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <!-- <?= $this->Form->create($user); ?> -->
    <form method="post" action="/users/register" enctype="multipart/form-data">
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
        
            echo $this->Html->script('application');
            echo $this->Form->input('username');
            echo $this->Form->input('name');
            echo $this->Form->input('email');
            echo $this->Form->input('dob');
            echo $this->Form->input('gender');
            // echo $this->Form->file('picture');
            echo $this->Form->hidden('MAX_FILE_SIZE', ['value' => '30000']);

            echo $this->Form->input('picture', [
                'type' => 'file'
            ]);


            // ('picture', array('type' => 'file'));
            echo $this->Form->input('password');
        ?>
           <input name="picture2" id="picture2" type="hidden">
    </fieldset>
    <div id="fileDisplayArea"></div>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
   
</div>












