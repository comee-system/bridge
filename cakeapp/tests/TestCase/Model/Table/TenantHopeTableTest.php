<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TenantHopeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TenantHopeTable Test Case
 */
class TenantHopeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TenantHopeTable
     */
    public $TenantHope;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TenantHope',
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
        $config = TableRegistry::getTableLocator()->exists('TenantHope') ? [] : ['className' => TenantHopeTable::class];
        $this->TenantHope = TableRegistry::getTableLocator()->get('TenantHope', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TenantHope);

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
