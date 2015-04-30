<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Http\Client;
// use('File', 'Utility');
// use Cake\Network\HttpSocket;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{




    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */


    public function login()
    {
        $loginResponse;

        if ($this->request->is('post')) {
                $data = array(
                    "challenger_token" => "d64a51be36af1551193003566d396091329b2b54",
                    "email" => $this->request->data['email'],
                    "password" => $this->request->data['password']
                        );
                $http = new Client();
                $response = $http->post(
                    'http://challengers.orainteractive.com/api/users/login.json',

                    json_encode($data),
                    ['type' => 'json']
                );


                $loginResponse = $response->json;
                $this->request->session()->write('user.token', $loginResponse['User']['token']);
               
                echo '<br>';
                
                print_r($this ->request->session()->read('user.token'));
                
                echo '<br>';
              
                print_r ($loginResponse);
                // return $this->redirect(['action' => 'index']);
              

                // if ($this->request->is('post')) {
                //     $user = $this->Auth->identify();
                //     if ($user) {
                //         $this->Auth->setUser($user);
                //         return $this->redirect($this->Auth->redirectUrl());
                //     }
                //     $this->Flash->error('Your username or password is incorrect.');
                // }
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function resetPassword()
    {

    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->allow(['add','resetPassword','edit','index','view','register']);
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Chats']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'add']);
            } else {
                $this->Flash->error('The user could not be saved. Please try again.');
                }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function register() 
    {

        
        // $img = $_POST['img.src'];

        // print_r(is_readable($this->request->data['picture']['tmp_name']));
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        // print_r(realpath($_FILES["picture"]["tmp_name"]));

        $data = array(
            "challenger_token" => "d64a51be36af1551193003566d396091329b2b54",
            "username" => $this->request->data['username'],
            "name" => $this->request->data['name'],
            "email" => $this->request->data['email'],
            "picture" => realpath($_FILES["picture"]["tmp_name"]),
            "dob" => "1984-01-01",
            "gender" => $this->request->data['gender'],
            "password" => $this->request->data['password']
                );
        $http = new Client();
        $response = $http->post(
            'http://challengers.orainteractive.com/api/users/register.json',

            json_encode($data),
            ['type' => 'json']
        );



        print_r ($response);
        // print_r ($this->request->data['picture2']);
       

        // print_r ($_FILES);
        // return $this->redirect(['action' => 'index']);


    }
    // public function add(){
    //     $HttpSocket = new HttpSocket();

    //     $data = array(
    //             "challenger_token" => "d64a51be36af1551193003566d396091329b2b54",
    //             "username" => "Steve",
    //             "name" => "Steve",
    //             "picture" =>"1001.png",
    //             "dob" => "1990-01-02",
    //             "gender" => "MALE"
    //             "password" => "password"
    //                 );

    //     $request = array(
    //         'header' => array(
    //             'Content-Type' => 'application/json',
    //         ),
    //     );
    //     $data = json_encode($data);
    //     $response = $HttpSocket->post('http://challengers.orainteractive.com/users/register.json', $data, $request);
    //     pr($data);
    //     pr($response->body());
    //     $this->redirect(array('action' => 'index'));     
    // }
}
