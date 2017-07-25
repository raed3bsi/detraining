<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlacementtestTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlacementtestTable Test Case
 */
class PlacementtestTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlacementtestTable
     */
    public $Placementtest;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.placementtest'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Placementtest') ? [] : ['className' => 'App\Model\Table\PlacementtestTable'];
        $this->Placementtest = TableRegistry::get('Placementtest', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Placementtest);

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
