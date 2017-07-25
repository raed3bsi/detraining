<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AbstractjobTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AbstractjobTable Test Case
 */
class AbstractjobTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AbstractjobTable
     */
    public $Abstractjob;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.abstractjob'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Abstractjob') ? [] : ['className' => 'App\Model\Table\AbstractjobTable'];
        $this->Abstractjob = TableRegistry::get('Abstractjob', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Abstractjob);

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
