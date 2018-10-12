<?php
namespace App\Controller;

use App\Controller\AppController;

class AProposController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['']
        ];
    }
    
    public function initialize() {
        parent::initialize();
    }
}
