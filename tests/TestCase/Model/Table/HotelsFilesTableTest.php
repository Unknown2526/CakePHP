<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HotelsFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HotelsFilesTable Test Case
 */
class HotelsFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HotelsFilesTable
     */
    public $HotelsFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hotels_files',
        'app.hotels',
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
        $config = TableRegistry::getTableLocator()->exists('HotelsFiles') ? [] : ['className' => HotelsFilesTable::class];
        $this->HotelsFiles = TableRegistry::getTableLocator()->get('HotelsFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HotelsFiles);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
