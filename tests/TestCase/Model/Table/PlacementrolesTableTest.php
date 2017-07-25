<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlacementrolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlacementrolesTable Test Case
 */
class PlacementrolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlacementrolesTable
     */
    public $Placementroles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.placementroles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Placementroles') ? [] : ['className' => 'App\Model\Table\PlacementrolesTable'];
        $this->Placementroles = TableRegistry::get('Placementroles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Placementroles);

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
