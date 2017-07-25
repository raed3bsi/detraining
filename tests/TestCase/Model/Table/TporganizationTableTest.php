<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TporganizationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TporganizationTable Test Case
 */
class TporganizationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TporganizationTable
     */
    public $Tporganization;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tporganization'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tporganization') ? [] : ['className' => 'App\Model\Table\TporganizationTable'];
        $this->Tporganization = TableRegistry::get('Tporganization', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tporganization);

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
