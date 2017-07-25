<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonAssignedPositionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonAssignedPositionsTable Test Case
 */
class PersonAssignedPositionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonAssignedPositionsTable
     */
    public $PersonAssignedPositions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.person_assigned_positions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PersonAssignedPositions') ? [] : ['className' => 'App\Model\Table\PersonAssignedPositionsTable'];
        $this->PersonAssignedPositions = TableRegistry::get('PersonAssignedPositions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PersonAssignedPositions);

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
