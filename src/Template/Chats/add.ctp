<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Chats'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Chatmessages'), ['controller' => 'Chatmessages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chatmessage'), ['controller' => 'Chatmessages', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="chats form large-10 medium-9 columns">
    <!-- <?= $this->Form->create($chat); ?> -->
     <form method="post" action="/chats/add">
    <fieldset>
        <legend><?= __('Add Chat') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('picture', array('type' => 'file'));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
