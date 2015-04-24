<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chatmessage Entity.
 */
class Chatmessage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'challenger_token' => true,
        'token' => true,
        'chat_id' => true,
        'message' => true,
        'picture' => true,
        'chat' => true,
    ];
}
