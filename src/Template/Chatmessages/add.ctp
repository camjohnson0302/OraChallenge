<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Chatmessages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Chats'), ['controller' => 'Chats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chat'), ['controller' => 'Chats', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="chatmessages form large-10 medium-9 columns">
    <!-- <?= $this->Form->create($chatmessage); ?> -->
         <form method="post" action="/chatmessages/add">
    <fieldset>
        <legend><?= __('Add Chatmessage') ?></legend>
        <?php
            echo $this->Form->input('token');
            echo $this->Form->input('message');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
