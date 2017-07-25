<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BusinessunittypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BusinessunittypeTable Test Case
 */
class BusinessunittypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BusinessunittypeTable
     */
    public $Businessunittype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.businessunittype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Businessunittype') ? [] : ['className' => 'App\Model\Table\BusinessunittypeTable'];
        $this->Businessunittype = TableRegistry::get('Businessunittype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Businessunittype);

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
