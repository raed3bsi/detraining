<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissionTable Test Case
 */
class PermissionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissionTable
     */
    public $Permission;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permission',
        'app.action',
        'app.amodel',
        'app.unitconfigs',
        'app.appmodel'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Permission') ? [] : ['className' => 'App\Model\Table\PermissionTable'];
        $this->Permission = TableRegistry::get('Permission', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Permission);

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
