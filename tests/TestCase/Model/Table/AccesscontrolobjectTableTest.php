<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AccesscontrolobjectTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AccesscontrolobjectTable Test Case
 */
class AccesscontrolobjectTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AccesscontrolobjectTable
     */
    public $Accesscontrolobject;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.accesscontrolobject'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Accesscontrolobject') ? [] : ['className' => 'App\Model\Table\AccesscontrolobjectTable'];
        $this->Accesscontrolobject = TableRegistry::get('Accesscontrolobject', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Accesscontrolobject);

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
