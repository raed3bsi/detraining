<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TporganizationtypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TporganizationtypeTable Test Case
 */
class TporganizationtypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TporganizationtypeTable
     */
    public $Tporganizationtype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tporganizationtype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tporganizationtype') ? [] : ['className' => 'App\Model\Table\TporganizationtypeTable'];
        $this->Tporganizationtype = TableRegistry::get('Tporganizationtype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tporganizationtype);

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
