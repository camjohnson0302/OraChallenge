<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Chatmessages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chatmessage'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chats'), ['controller' => 'Chats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chat'), ['controller' => 'Chats', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="chatmessages view large-10 medium-9 columns">
    <h2><?= h($chatmessage->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Chat') ?></h6>
            <p><?= $chatmessage->has('chat') ? $this->Html->link($chatmessage->chat->name, ['controller' => 'Chats', 'action' => 'view', $chatmessage->chat->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($chatmessage->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($chatmessage->created) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Message') ?></h6>
            <?= $this->Text->autoParagraph(h($chatmessage->message)); ?>
        </div>
    </div>
</div>
