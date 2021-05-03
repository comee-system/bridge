<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TenantJobTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TenantJobTable Test Case
 */
class TenantJobTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TenantJobTable
     */
    public $TenantJob;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TenantJob',
        'app.Tenants',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TenantJob') ? [] : ['className' => TenantJobTable::class];
        $this->TenantJob = TableRegistry::getTableLocator()->get('TenantJob', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TenantJob);

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
