<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartmenttypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartmenttypeTable Test Case
 */
class DepartmenttypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartmenttypeTable
     */
    public $Departmenttype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.departmenttype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Departmenttype') ? [] : ['className' => 'App\Model\Table\DepartmenttypeTable'];
        $this->Departmenttype = TableRegistry::get('Departmenttype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Departmenttype);

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
