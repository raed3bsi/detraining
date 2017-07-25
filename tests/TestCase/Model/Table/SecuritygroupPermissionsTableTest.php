<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SecuritygroupPermissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SecuritygroupPermissionsTable Test Case
 */
class SecuritygroupPermissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SecuritygroupPermissionsTable
     */
    public $SecuritygroupPermissions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.securitygroup_permissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SecuritygroupPermissions') ? [] : ['className' => 'App\Model\Table\SecuritygroupPermissionsTable'];
        $this->SecuritygroupPermissions = TableRegistry::get('SecuritygroupPermissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SecuritygroupPermissions);

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
