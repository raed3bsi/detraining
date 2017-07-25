<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppmodelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppmodelTable Test Case
 */
class AppmodelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppmodelTable
     */
    public $Appmodel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Appmodel') ? [] : ['className' => 'App\Model\Table\AppmodelTable'];
        $this->Appmodel = TableRegistry::get('Appmodel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Appmodel);

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
