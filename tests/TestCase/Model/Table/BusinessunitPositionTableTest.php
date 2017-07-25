<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BusinessunitPositionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BusinessunitPositionTable Test Case
 */
class BusinessunitPositionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BusinessunitPositionTable
     */
    public $BusinessunitPosition;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.businessunit_position'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BusinessunitPosition') ? [] : ['className' => 'App\Model\Table\BusinessunitPositionTable'];
        $this->BusinessunitPosition = TableRegistry::get('BusinessunitPosition', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BusinessunitPosition);

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
