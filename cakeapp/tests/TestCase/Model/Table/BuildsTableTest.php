<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuildsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuildsTable Test Case
 */
class BuildsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BuildsTable
     */
    public $Builds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Builds',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Builds') ? [] : ['className' => BuildsTable::class];
        $this->Builds = TableRegistry::getTableLocator()->get('Builds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Builds);

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
