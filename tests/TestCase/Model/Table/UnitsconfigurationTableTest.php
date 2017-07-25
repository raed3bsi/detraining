<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UnitsconfigurationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UnitsconfigurationTable Test Case
 */
class UnitsconfigurationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UnitsconfigurationTable
     */
    public $Unitsconfiguration;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.unitsconfiguration'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Unitsconfiguration') ? [] : ['className' => 'App\Model\Table\UnitsconfigurationTable'];
        $this->Unitsconfiguration = TableRegistry::get('Unitsconfiguration', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Unitsconfiguration);

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
