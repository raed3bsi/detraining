<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpecializationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpecializationTable Test Case
 */
class SpecializationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpecializationTable
     */
    public $Specialization;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.specialization'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Specialization') ? [] : ['className' => 'App\Model\Table\SpecializationTable'];
        $this->Specialization = TableRegistry::get('Specialization', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Specialization);

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
