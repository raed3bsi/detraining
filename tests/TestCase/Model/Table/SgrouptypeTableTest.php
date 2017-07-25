<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SgrouptypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SgrouptypeTable Test Case
 */
class SgrouptypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SgrouptypeTable
     */
    public $Sgrouptype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sgrouptype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sgrouptype') ? [] : ['className' => 'App\Model\Table\SgrouptypeTable'];
        $this->Sgrouptype = TableRegistry::get('Sgrouptype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sgrouptype);

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
