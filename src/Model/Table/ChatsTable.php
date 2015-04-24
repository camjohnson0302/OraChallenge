<?php
namespace App\Model\Table;

use App\Model\Entity\Chat;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chats Model
 */
class ChatsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('chats');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasMany('Chatmessages', [
            'foreignKey' => 'chat_id'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'chat_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'chats_users'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('challenger_token', 'create')
            ->notEmpty('challenger_token')
            ->requirePresence('token', 'create')
            ->notEmpty('token')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->allowEmpty('picture');

        return $validator;
    }
}
