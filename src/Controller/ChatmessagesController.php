<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Http\Client;
/**
 * Chatmessages Controller
 *
 * @property \App\Model\Table\ChatmessagesTable $Chatmessages
 */
class ChatmessagesController extends AppController
{



    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        // $this->paginate = [
        //     'contain' => ['Chats']
        // ];
        // $this->set('chatmessages', $this->paginate($this->Chatmessages));
        // $this->set('_serialize', ['chatmessages']);

        $data = array(
                "challenger_token" => "d64a51be36af1551193003566d396091329b2b54",
                "token" => $this ->request->session()->read('user.token'),
                "chat_id" => 1,
                "page" => "",
                "limit" => "",
                // "picture" => $this->request->data['picture'],
                    );
        $http = new Client();
        $response = $http->post(
            'http://challengers.orainteractive.com/api/chat_messages/index.json',
            json_encode($data),
            ['type' => 'json']
        );
        // print_r ($data);
        print_r ($response);

    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['add','view','index']);
    }

    /**
     * View method
     *
     * @param string|null $id Chatmessage id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chatmessage = $this->Chatmessages->get($id, [
            'contain' => ['Chats']
        ]);
        $this->set('chatmessage', $chatmessage);
        $this->set('_serialize', ['chatmessage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // $chatmessage = $this->Chatmessages->newEntity();
        // if ($this->request->is('post')) {
        //     $chatmessage = $this->Chatmessages->patchEntity($chatmessage, $this->request->data);
        //     if ($this->Chatmessages->save($chatmessage)) {
        //         $this->Flash->success('The chatmessage has been saved.');
        //         return $this->redirect(['action' => 'index']);
        //     } else {
        //         $this->Flash->error('The chatmessage could not be saved. Please, try again.');
        //     }
        // }
        // $chats = $this->Chatmessages->Chats->find('list', ['limit' => 200]);
        // $this->set(compact('chatmessage', 'chats'));
        // $this->set('_serialize', ['chatmessage']);




        if ($this->request->is('post')) {


            $data = array(
                "challenger_token" => "d64a51be36af1551193003566d396091329b2b54",
                "token" => $this ->request->session()->read('user.token'),
                "chat_id" => 1,
                "message" => "snargleblarf",
                // "picture" => $this->request->data['picture'],
                    );
            $http = new Client();
            $response = $http->post(
                'http://challengers.orainteractive.com/api/chat_messages/create.json',
                json_encode($data),
                ['type' => 'json']
            );
            print_r ($data);
            print_r ($response);
            // return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Chatmessage id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chatmessage = $this->Chatmessages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chatmessage = $this->Chatmessages->patchEntity($chatmessage, $this->request->data);
            if ($this->Chatmessages->save($chatmessage)) {
                $this->Flash->success('The chatmessage has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The chatmessage could not be saved. Please, try again.');
            }
        }
        $chats = $this->Chatmessages->Chats->find('list', ['limit' => 200]);
        $this->set(compact('chatmessage', 'chats'));
        $this->set('_serialize', ['chatmessage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chatmessage id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chatmessage = $this->Chatmessages->get($id);
        if ($this->Chatmessages->delete($chatmessage)) {
            $this->Flash->success('The chatmessage has been deleted.');
        } else {
            $this->Flash->error('The chatmessage could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
