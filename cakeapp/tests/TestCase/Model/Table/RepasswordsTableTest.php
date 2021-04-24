<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RepasswordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RepasswordsTable Test Case
 */
class RepasswordsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RepasswordsTable
     */
    public $Repasswords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Repasswords',
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
        $config = TableRegistry::getTableLocator()->exists('Repasswords') ? [] : ['className' => RepasswordsTable::class];
        $this->Repasswords = TableRegistry::getTableLocator()->get('Repasswords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Repasswords);

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
