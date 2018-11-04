<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Hotels']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'Hotels', 'action' => 'index']);
            } else {
                $this->Flash->error('Votre identifiant ou votre mot de passe est incorrect.');
            }
        }
    }
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['logout', 'addClient']);
    }

    public function logout() {
        $this->Flash->success('Vous avez été déconnecté.');
        $this->Auth->logout();
        return $this->redirect(['controller' => 'Hotels', 'action' => 'index']);
    }
    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        $role = $user['role_id'];
        
        if ($role === "admin") {
            return true;
        }
        
        if($role === "proprietaire"){
            return $action === "chercherInfo";
        }
        
        if($role === "client"){
            return $action === "chercherInfo";
        }
        
        if($role === null){
            if(in_array($action, ['addClient'])) {
                return true;
            }
        }
        
        return false;
    }
    
    public function chercherInfo() {
        $user = $this->request->session()->read('Auth.User');

            
            /**$user = $this->Users->find('all', [
            'conditions' => ['role_id' => $user['role_id']]
            ]);
            $first = $user->first();
            $this->redirect(['controller' => 'Users', 'action' => 'view', $first['user_id']]);*/
            
            
            if ($user['role_id'] === 'admin') {
            $admin = $this->Users->find('all', [
                'conditions' => ['role_id' => $user['role_id']]
            ]);
            $first = $admin->first();
            $this->redirect(['controller' => 'Users', 'action' => 'view', $first['user_id']]);
        }

        if ($user['role_id'] === 'proprietaire') {
            $proprietaire = $this->Users->find('all', [
                'conditions' => ['role_id' => $user['role_id']]
            ]);
            $first = $proprietaire->first();
            $this->redirect(['controller' => 'Users', 'action' => 'view', $first['user_id']]);
        }

        if ($user['role_id'] === 'client') {
            $client = $this->Users->Clients->find('all', [
                'conditions' => ['user_id' => $user['user_id']]
            ]);
            $first = $client->first();
            debug($first);
            $this->redirect(['controller' => 'Clients', 'action' => 'view', $first['client_id']]);
        }
        
    }
    
    public function addClient() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user['role_id'] = 'client';
            
            if ($this->Users->save($user)) {
                
                $client = TableRegistry::get('Clients');
                $clientProfil = $client->newEntity();
                $clientProfil->email = $user['email'];
                $clientProfil->user_id = $user['user_id'];
                $client->save($clientProfil);
                
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }
}
