<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ViewTenantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ViewTenantsTable Test Case
 */
class ViewTenantsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ViewTenantsTable
     */
    public $ViewTenants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ViewTenants',
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
        $config = TableRegistry::getTableLocator()->exists('ViewTenants') ? [] : ['className' => ViewTenantsTable::class];
        $this->ViewTenants = TableRegistry::getTableLocator()->get('ViewTenants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ViewTenants);

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
