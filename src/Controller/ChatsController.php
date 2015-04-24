<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Http\Client;
/**
 * Chats Controller
 *
 * @property \App\Model\Table\ChatsTable $Chats
 */
class ChatsController extends AppController
{


    public function getChallenger()
    {
        return "d64a51be36af1551193003566d396091329b2b54";
    }/**
     * Index method
     *
     * @return void
     */

    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];

        if (in_array($action, ['index', 'add', 'chatmessages'])) {
            return true;
        }
       
        if (empty($this->request->params['pass'][0])) {
            return false;
        }

       
        $id = $this->request->params['pass'][0];
        $bookmark = $this->Chats->get($id);
        if ($chat->user_id == $user['id']) {
            return true;
        }
        return parent::isAuthorized($user);
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['add','index','view']);
    }

    public function index()
    {
       

        // if ($this->request->is('post')) {


            $data = array(
                "challenger_token" => "d64a51be36af1551193003566d396091329b2b54",
                "token" => $this ->request->session()->read('user.token'),
                "query" => "",
                "page" => "",
                "limit" => ""
                // "picture" => $this->request->data['picture'],
                    );
            $http = new Client();
            $response = $http->post(
                'http://challengers.orainteractive.com/api/chats/index.json',
                json_encode($data),
                ['type' => 'json']
            );
            // print_r ($data);
            print_r ($response);
        // }
        // $this->paginate =         //     'contain' => ['Users']
        // ];
        // $this->set('chats', $this->paginate($this->Chats));
          // $this->set('_serialize', ['chats']);
    }

    /**
     * View method
     *
     * @param string|null $id Chat id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chat = $this->Chats->get($id, [
            'contain' => ['Users', 'Chatmessages', 'ChatsUsers']
        ]);
        $this->set('chat', $chat);
        $this->set('_serialize', ['chat']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // $chat = $this->Chats->newEntity();
        if ($this->request->is('post')) {


            $data = array(
                "challenger_token" => "d64a51be36af1551193003566d396091329b2b54",
                "token" => $this ->request->session()->read('user.token'),
                "name" => $this->request->data['name'],
                // "picture" => $this->request->data['picture'],
                    );
            $http = new Client();
            $response = $http->post(
                'http://challengers.orainteractive.com/api/chats/create.json',
                json_encode($data),
                ['type' => 'json']
            );
            // print_r ($data);
            print_r ($response);
            // return $this->redirect(['action' => 'index']);





            // $chat = $this->Chats->patchEntity($chat, $this->request->data);
            //  $chat->user_id = $this->Auth->user('id');
            // if ($this->Chats->save($chat)) {
            //     $this->Flash->success('New chat started');
            //     return $this->redirect(['action' => 'index']);
            // } else {
            //     $this->Flash->error('Could not create chat. Please try again.');
            // }
        }
        // $users = $this->Chats->Users->find('list', ['limit' => 200]);
        // $this->set(compact('chat', 'users'));
        // $this->set('_serialize', ['chat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Chat id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chat = $this->Chats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chat = $this->Chats->patchEntity($chat, $this->request->data);
            $chat->user_id = $this->Auth->user('id');
            if ($this->Chats->save($chat)) {
                $this->Flash->success('The chat has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The chat could not be saved. Please, try again.');
            }
        }
        $users = $this->Chats->Users->find('list', ['limit' => 200]);
        $this->set(compact('chat', 'users'));
        $this->set('_serialize', ['chat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chat id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chat = $this->Chats->get($id);
        if ($this->Chats->delete($chat)) {
            $this->Flash->success('The chat has been deleted.');
        } else {
            $this->Flash->error('The chat could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
