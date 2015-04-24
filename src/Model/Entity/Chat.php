<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chat Entity.
 */
class Chat extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'challenger_token' => true,
        'token' => true,
        'name' => true,
        'picture' => true,
        'user' => true,
        'chatmessages' => true,
    ];
}
