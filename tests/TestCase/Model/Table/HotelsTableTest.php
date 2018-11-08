<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HotelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HotelsTable Test Case
 */
class HotelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HotelsTable
     */
    public $Hotels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hotels',
        'app.users',
        'app.pays',
        'app.files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Hotels') ? [] : ['className' => HotelsTable::class];
        $this->Hotels = TableRegistry::getTableLocator()->get('Hotels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hotels);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $data = ['hotel_id' => 1,
                'hotel_nom' => '',
                'hotel_adresse' => 'Lorem ipsum dolor sit amet',
                'hotel_codepostal' => 'Lorem ipsum dolor sit amet',
                'hotel_url' => 'Lorem ipsum dolor sit amet',
                'pays_code' => 1,
                'ville_id' => 1,
                'user_id' => 1,
                'listHotels_id' => 1,
                'created' => null,
                'modified' => null];
        
        $hotel = $this->Hotels->newEntity($data);
        $this->assertNotEmpty($hotel->errors());
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
    
    public function testFindPays()
    {
        $query = $this->Hotels->find('pays');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();

        $expected = [
            ['hotel_id' => 1,
                'hotel_nom' => 'Lorem ipsum dolor sit amet',
                'hotel_adresse' => 'Lorem ipsum dolor sit amet',
                'hotel_codepostal' => 'Lorem ipsum dolor sit amet',
                'hotel_url' => 'Lorem ipsum dolor sit amet',
                'pays_code' => 1,
                'ville_id' => 1,
                'user_id' => 1,
                'listHotels_id' => 1,
                'created' => null,
                'modified' => null]
        ];
        $this->assertEquals($expected, $result);
    }
}
