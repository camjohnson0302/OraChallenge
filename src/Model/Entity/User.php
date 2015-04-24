<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'challenger_token' => true,
        'username' => true,
        'name' => true,
        'email' => true,
        'picture' => true,
        'dob' => true,
        'gender' => true,
        'password' => true,
        'chats' => true,
    ];
    
    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }

}