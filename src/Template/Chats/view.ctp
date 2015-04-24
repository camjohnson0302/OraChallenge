<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Chats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chatmessage'), ['controller' => 'Chatmessages', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="chats view large-10 medium-9 columns">
    <h2><?= h($chat->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($chat->name) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($chat->created) ?></p>
            <h6 class="subheader"><?= __('Updated') ?></h6>
            <p><?= h($chat->updated) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Chatmessages') ?></h4>
    <?php if (!empty($chat->chatmessages)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Message') ?></th>
            <th><?= __('Picture') ?></th>
            <th><?= __('Created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($chat->chatmessages as $chatmessages): ?>
        <tr>
            <td><?= h($chatmessages->message) ?></td>
            <td><?= h($chatmessages->picture) ?></td>
            <td><?= h($chatmessages->created) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Chatmessages', 'action' => 'view', $chatmessages->id]) ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>

