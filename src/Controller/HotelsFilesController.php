<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HotelsFiles Controller
 *
 * @property \App\Model\Table\HotelsFilesTable $HotelsFiles
 *
 * @method \App\Model\Entity\HotelsFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HotelsFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Hotels', 'Files']
        ];
        $hotelsFiles = $this->paginate($this->HotelsFiles);

        $this->set(compact('hotelsFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Hotels File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hotelsFile = $this->HotelsFiles->get($id, [
            'contain' => ['Hotels', 'Files']
        ]);

        $this->set('hotelsFile', $hotelsFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hotelsFile = $this->HotelsFiles->newEntity();
        if ($this->request->is('post')) {
            $hotelsFile = $this->HotelsFiles->patchEntity($hotelsFile, $this->request->getData());
            if ($this->HotelsFiles->save($hotelsFile)) {
                $this->Flash->success(__('The hotels file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hotels file could not be saved. Please, try again.'));
        }
        $hotels = $this->HotelsFiles->Hotels->find('list', ['limit' => 200]);
        $files = $this->HotelsFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('hotelsFile', 'hotels', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hotels File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hotelsFile = $this->HotelsFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hotelsFile = $this->HotelsFiles->patchEntity($hotelsFile, $this->request->getData());
            if ($this->HotelsFiles->save($hotelsFile)) {
                $this->Flash->success(__('The hotels file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hotels file could not be saved. Please, try again.'));
        }
        $hotels = $this->HotelsFiles->Hotels->find('list', ['limit' => 200]);
        $files = $this->HotelsFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('hotelsFile', 'hotels', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hotels File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hotelsFile = $this->HotelsFiles->get($id);
        if ($this->HotelsFiles->delete($hotelsFile)) {
            $this->Flash->success(__('The hotels file has been deleted.'));
        } else {
            $this->Flash->error(__('The hotels file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
