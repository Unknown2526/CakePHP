<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ListHotels Controller
 *
 * @property \App\Model\Table\ListHotelsTable $ListHotels
 *
 * @method \App\Model\Entity\ListHotel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ListHotelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $listHotels = $this->paginate($this->ListHotels);

        $this->set(compact('listHotels'));
    }

    /**
     * View method
     *
     * @param string|null $id List Hotel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $listHotel = $this->ListHotels->get($id, [
            'contain' => []
        ]);

        $this->set('listHotel', $listHotel);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listHotel = $this->ListHotels->newEntity();
        if ($this->request->is('post')) {
            $listHotel = $this->ListHotels->patchEntity($listHotel, $this->request->getData());
            if ($this->ListHotels->save($listHotel)) {
                $this->Flash->success(__('The list hotel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The list hotel could not be saved. Please, try again.'));
        }
        $this->set(compact('listHotel'));
    }

    /**
     * Edit method
     *
     * @param string|null $id List Hotel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $listHotel = $this->ListHotels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listHotel = $this->ListHotels->patchEntity($listHotel, $this->request->getData());
            if ($this->ListHotels->save($listHotel)) {
                $this->Flash->success(__('The list hotel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The list hotel could not be saved. Please, try again.'));
        }
        $this->set(compact('listHotel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id List Hotel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listHotel = $this->ListHotels->get($id);
        if ($this->ListHotels->delete($listHotel)) {
            $this->Flash->success(__('The list hotel has been deleted.'));
        } else {
            $this->Flash->error(__('The list hotel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
