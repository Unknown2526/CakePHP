<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
/**
 * Hotels Controller
 *
 * @property \App\Model\Table\HotelsTable $Hotels
 *
 * @method \App\Model\Entity\Hotel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HotelsController extends AppController
{

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['findHotels', 'autocompletedemo']);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Pays', 'Files', 'Villes']
        ];
        $hotels = $this->paginate($this->Hotels);

        $this->set(compact('hotels'));
    }

    /**
     * View method
     *
     * @param string|null $id Hotel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hotel = $this->Hotels->get($id, [
            'contain' => ['Users', 'Pays', 'Files', 'Villes']
        ]);

        $this->set('hotel', $hotel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hotel = $this->Hotels->newEntity();
        if ($this->request->is('post')) {
            $hotel = $this->Hotels->patchEntity($hotel, $this->request->getData());
            
            $loguser = $this->request->session()->read('Auth.User');
            $hotel->user_id = $loguser['user_id'];
            
            if ($this->Hotels->save($hotel)) {
                $this->Flash->success(__('The hotel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hotel could not be saved. Please, try again.')); 
        }
        
        // Bâtir la liste des Pays  
        $this->loadModel('Pays');
        $pays = $this->Pays->find('list', ['limit' => 200]);

        // Extraire le id du premier pays
        $pays = $pays->toArray();
        reset($pays);
        $pays_code = key($pays);

        // Bâtir la liste des villes reliées à ce pays
        $villes = $this->Pays->Villes->find('list', [
            'conditions' => ['Villes.pays_code' => $pays_code],
        ]);
        
        $users = $this->Hotels->Users->find('list', ['limit' => 200, 'keyField' => 'user_id', 'valueField' => 'email']);
        //$pays = $this->Hotels->Pays->find('list', ['limit' => 200, 'keyField' => 'pays_code', 'valueField' => 'pays_nom']);
        //$villes = $this->Hotels->Pays->Villes->find('list', ['limit' => 200, 'keyField' => 'id', 'valueField' => 'nom']);
        //$files = $this->Hotels->Files->find('list', ['limit' => 200]);
        $this->set(compact('hotel', 'users', 'pays', 'files', 'villes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hotel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hotel = $this->Hotels->get($id, [
            'contain' => ['Files', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hotel = $this->Hotels->patchEntity($hotel, $this->request->getData());
            if ($this->Hotels->save($hotel)) {
                $this->Flash->success(__('The hotel has been saved.'));

                //return $this->redirect(['action' => 'index']);
                return $this->redirect(['controller' => 'Hotels', 'action' => 'view', $hotel['hotel_id']]);
            }
            $this->Flash->error(__('The hotel could not be saved. Please, try again.'));
        }
        $users = $this->Hotels->Users->find('list', ['limit' => 200]);
        $pays = $this->Hotels->Pays->find('list', ['limit' => 200, 'keyField' => 'pays_code', 'valueField' => 'pays_nom']);
        $files = $this->Hotels->Files->find('list', ['limit' => 200]);
        $villes = $this->Hotels->Villes->find('list', ['limit' => 200]);
        $this->set(compact('hotel', 'users', 'pays', 'files', 'villes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hotel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hotel = $this->Hotels->get($id);
        if ($this->Hotels->delete($hotel)) {
            $this->Flash->success(__('The hotel has been deleted.'));
        } else {
            $this->Flash->error(__('The hotel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        $role = $user['role_id'];

        if ($role === "proprietaire") {
            if ($action === "edit" || $action === 'delete') {
                $passParam = $this->request->getParam('pass');
                $sujet = $this->Hotels->get($passParam);

                return $user['user_id'] === $sujet['user_id'];
            } else {
                return in_array($action, ['display', 'view', 'index', 'add']);
            }
        }
        
        if($role === "client"){
            if(in_array($action, ['display', 'view', 'index', 'reserver'])) {
                return true;
            } else {
                return false;
            }
        }
        
        if ($role == 'admin') {
            return true;
        }

        return false;
    }
    
    public function reserver() {
        //prendre le email de l'hotel     
        $hotel = $this->Hotels->get($this->request->getParam('pass'));
        $user = $this->Hotels->Users->find('all', [
            'conditions' => ['user_id' => $hotel['user_id']]
        ]);
        $first = $user->first();
        $hotelEmail = $first['email'];
        
        //information du client
        $loguser = $this->request->session()->read('Auth.User');

        $user = TableRegistry::get('Users');
        $user = $user->find('all', [
            'conditions' => ['user_id' => $loguser['user_id']]
        ]);
        $client = $user->first();
        
        //reservation
        //$hotelid = $this->request->getParam('pass');

        //$confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/confirm/uuidxyz";
        
        $uuid = Text::uuid();
        $webroot = $this->request->webroot;
        
        
        $email = new Email('default');
        $email->emailFormat('html');
        $email->to($hotelEmail)->subject('Réservation d\'un hotel')
                ->send('Le client : ' . $client['email'] . ' a fait une réservation à votre hotel '
                        . $hotel['hotel_nom'] . ' à cette adresse ' . $hotel['hotel_adresse']
                        . '.<br><br><a href="localhost'.$webroot.'EmailsController/verifier?uuid='.$uuid.'">Verifier mon email</a>');
        //UUID pas fait
        $this->Flash->success(__('Vous avez reservé.'));
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * findHotels method
     * for use with JQuery-UI Autocomplete
     *
     * @return JSon query result
     */
    public function findHotels() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            
            $listHotels = TableRegistry::get('list_hotels');
            $listHotels = $listHotels->find('all', array(
                'conditions' => array('list_hotels.nom LIKE ' => '%' . $name . '%')
            ));
            
            /**$results = $this->Hotels->find('all', array(
                'conditions' => array('Hotels.hotel_nom LIKE ' => '%' . $name . '%')
            ));*/
            
            $resultArr = array();
            foreach ($listHotels as $hotel) {
                $resultArr[] = array('label' => $hotel['nom'], 'value' => $hotel['hotel_nom']);
            }
            echo json_encode($resultArr);
        }
    }

    public function autocompletedemo() {
        
    }
}