<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Villes Controller
 *
 * @property \App\Model\Table\VillesTable $Villes
 *
 * @method \App\Model\Entity\Ville[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VillesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $villes = $this->paginate($this->Villes);

        $this->set(compact('villes'));
    }

    /**
     * View method
     *
     * @param string|null $id Ville id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ville = $this->Villes->get($id, [
            'contain' => []
        ]);

        $this->set('ville', $ville);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ville = $this->Villes->newEntity();
        if ($this->request->is('post')) {
            $ville = $this->Villes->patchEntity($ville, $this->request->getData());
            if ($this->Villes->save($ville)) {
                $this->Flash->success(__('The ville has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ville could not be saved. Please, try again.'));
        }
        $this->set(compact('ville'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ville id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ville = $this->Villes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ville = $this->Villes->patchEntity($ville, $this->request->getData());
            if ($this->Villes->save($ville)) {
                $this->Flash->success(__('The ville has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ville could not be saved. Please, try again.'));
        }
        $this->set(compact('ville'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ville id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ville = $this->Villes->get($id);
        if ($this->Villes->delete($ville)) {
            $this->Flash->success(__('The ville has been deleted.'));
        } else {
            $this->Flash->error(__('The ville could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function getByPays() {
        $pays_code = $this->request->query('pays_code');

        $villes = $this->Villes->find('all', [
            'conditions' => ['Villes.pays_code' => $pays_code],
        ]);
        $this->set('villes', $villes);
        $this->set('_serialize', ['villes']);
    }
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['getByPays']);
    }

    public function isAuthorized($user) {
        return true;
    }
}
