<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Hotels Controller
 *
 * @property \App\Model\Table\HotelsTable $Hotels
 *
 * @method \App\Model\Entity\Hotel[] paginate($object = null, array $settings = [])
 */
class HotelsController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 150,
        /*        'fields' => [
          'id', 'name', 'description'
          ],
         */ 'sortWhitelist' => [
            'hotel_id', 'hotel_nom', 'hotel_adresse', 'hotel_url'
        ]
    ];

    public function initialize() {
        parent::initialize();
        // Use the Bootstrap layout from the plugin.
        // $this->viewBuilder()->setLayout('admin');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $hotels = $this->paginate($this->Hotels);

        $this->set(compact('hotels'));
        $this->set('_serialize', ['hotels']);
    }

    /**
     * View method
     *
     * @param string|null $id Hotel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $hotel = $this->Hotels->get($id, [
            'contain' => ['Users', 'Pays', 'Files', 'Villes']
        ]);

        $this->set('hotel', $hotel);
        $this->set('_serialize', ['hotel']);
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
        $this->set('_serialize', ['hotel']);
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

                return $this->redirect(['action' => 'index']);
                //return $this->redirect(['controller' => 'Hotels', 'action' => 'view', $hotel['hotel_id']]);
            }
            $this->Flash->error(__('The hotel could not be saved. Please, try again.'));
        }
        $users = $this->Hotels->Users->find('list', ['limit' => 200]);
        $pays = $this->Hotels->Pays->find('list', ['limit' => 200, 'keyField' => 'pays_code', 'valueField' => 'pays_nom']);
        $files = $this->Hotels->Files->find('list', ['limit' => 200]);
        $villes = $this->Hotels->Villes->find('list', ['limit' => 200]);
        $this->set(compact('hotel', 'users', 'pays', 'files', 'villes'));
        $this->set('_serialize', ['hotel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hotel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $hotel = $this->Hotels->get($id);
        if ($this->Hotels->delete($hotel)) {
            $this->Flash->success(__('The hotel has been deleted.'));
        } else {
            $this->Flash->error(__('The hotel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
