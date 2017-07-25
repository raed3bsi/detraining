<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaterialtypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaterialtypeTable Test Case
 */
class MaterialtypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MaterialtypeTable
     */
    public $Materialtype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.materialtype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Materialtype') ? [] : ['className' => 'App\Model\Table\MaterialtypeTable'];
        $this->Materialtype = TableRegistry::get('Materialtype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Materialtype);

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
