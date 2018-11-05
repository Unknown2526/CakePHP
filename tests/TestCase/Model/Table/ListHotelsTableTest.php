<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ListHotelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ListHotelsTable Test Case
 */
class ListHotelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ListHotelsTable
     */
    public $ListHotels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.list_hotels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ListHotels') ? [] : ['className' => ListHotelsTable::class];
        $this->ListHotels = TableRegistry::getTableLocator()->get('ListHotels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ListHotels);

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
        $this->markTestIncomplete('Not implemented yet.');
    }
}
