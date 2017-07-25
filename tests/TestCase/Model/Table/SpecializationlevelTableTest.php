<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpecializationlevelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpecializationlevelTable Test Case
 */
class SpecializationlevelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpecializationlevelTable
     */
    public $Specializationlevel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.specializationlevel'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Specializationlevel') ? [] : ['className' => 'App\Model\Table\SpecializationlevelTable'];
        $this->Specializationlevel = TableRegistry::get('Specializationlevel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Specializationlevel);

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
