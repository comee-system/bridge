<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommentDetailTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommentDetailTable Test Case
 */
class CommentDetailTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CommentDetailTable
     */
    public $CommentDetail;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CommentDetail',
        'app.Comments',
        'app.Users',
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
        $config = TableRegistry::getTableLocator()->exists('CommentDetail') ? [] : ['className' => CommentDetailTable::class];
        $this->CommentDetail = TableRegistry::getTableLocator()->get('CommentDetail', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CommentDetail);

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
