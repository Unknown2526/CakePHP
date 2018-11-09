<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class PaysController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 100,
        'maxLimit' => 150,
/*        'fields' => [
            'id', 'name', 'description'
        ],
*/        'sortWhitelist' => [
            'pays_code', 'pays_devise', 'pays_nom'
        ]
    ];
    
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforefilter($event);
        if($this->request->param('action') === 'add') {
            $this->eventManager()->off($this->Csrf);
        }
    }

}
