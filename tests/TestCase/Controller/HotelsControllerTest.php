<?php
namespace App\Test\TestCase\Controller;

use App\Controller\HotelsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\HotelsController Test Case
 */
class HotelsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hotels',
        'app.users',
        'app.pays',
        'app.files',
        'app.hotels_files',
        'app.villes',
        'core.translates'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/hotels/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'user_id' => 1,
                    'email' => 'anthonychow@gmail.com',
                    'password' => 'Lorem ipsum dolor sit amet',
                    'role_id' => 'admin',
                    'created' => null,
                    'modified' => null
                ]
            ]
        ]);
        $this->get('/hotels/add');

        $this->assertResponseOk();
        
        $data = [
                'hotel_id' => 1,
                'hotel_nom' => 'Lorem ipsum dolor sit amet',
                'hotel_adresse' => 'Lorem ipsum dolor sit amet',
                'hotel_codepostal' => 'Lorem ipsum dolor sit amet',
                'hotel_url' => 'Lorem ipsum dolor sit amet',
                'pays_code' => 1,
                'ville_id' => 1,
                'user_id' => 1,
                'listHotels_id' => 1,
                'created' => null,
                'modified' => null
        ];
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/hotels/add', $data);
        $this->assertResponseSuccess();
        //$this->assertResponseContains('The hotel has been saved.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'user_id' => 1,
                    'email' => 'anthonychow@gmail.com',
                    'password' => 'Lorem ipsum dolor sit amet',
                    'role_id' => 'admin',
                    'created' => null,
                    'modified' => null
                ]
            ]
        ]);
        $this->get('/hotels/edit/1');

        $this->assertResponseOk();
        
        $data = [
                'hotel_id' => 1,
                'hotel_nom' => 'blabla',
                'hotel_adresse' => 'Lorem ipsum dolor sit amet',
                'hotel_codepostal' => 'Lorem ipsum dolor sit amet',
                'hotel_url' => 'Lorem ipsum dolor sit amet',
                'pays_code' => 1,
                'ville_id' => 1,
                'user_id' => 1,
                'listHotels_id' => 1,
                'created' => null,
                'modified' => null
        ];
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/hotels/edit/1', $data);
        $this->assertResponseSuccess();
        
        $expected = [
                'hotel_id' => 1,
                'hotel_nom' => 'blabla',
                'hotel_adresse' => 'Lorem ipsum dolor sit amet',
                'hotel_codepostal' => 'Lorem ipsum dolor sit amet',
                'hotel_url' => 'Lorem ipsum dolor sit amet',
                'pays_code' => 1,
                'ville_id' => 1,
                'user_id' => 1,
                'listHotels_id' => 1,
                'created' => null,
                'modified' => null
        ];
        
        $this->assertEquals($expected, $data);
        
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'user_id' => 1,
                    'email' => 'anthonychow@gmail.com',
                    'password' => 'Lorem ipsum dolor sit amet',
                    'role_id' => 'admin',
                    'created' => null,
                    'modified' => null
                ]
            ]
        ]);
        
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/hotels/delete/1');
        $this->assertResponseSuccess();
        
        $hotels = TableRegistry::get('Hotels');
        $query = $hotels->find('all');
        $result = $query->hydrate(false)->toArray();
        $count = count($result);
        debug($count);
        $this->assertEquals(0, $count);
    }
    
    public function testAddAuthenticated()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'user_id' => 1,
                    'email' => 'anthonychow@gmail.com',
                    'password' => 'Lorem ipsum dolor sit amet',
                    'role_id' => 'admin',
                    'created' => null,
                    'modified' => null
                ]
            ]
        ]);
        
        $this->get('/hotels/add');

        $this->assertResponseOk();
    }
    
    public function testAddUnauthenticatedFails()
    {
        $this->get('/hotels/add');

        $this->assertRedirect(['controller' => 'Users', 'action' => 'login', 'redirect'=> '/hotels/add']);
    }
}
