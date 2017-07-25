<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissiongroupTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissiongroupTable Test Case
 */
class PermissiongroupTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissiongroupTable
     */
    public $Permissiongroup;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permissiongroup'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Permissiongroup') ? [] : ['className' => 'App\Model\Table\PermissiongroupTable'];
        $this->Permissiongroup = TableRegistry::get('Permissiongroup', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Permissiongroup);

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
