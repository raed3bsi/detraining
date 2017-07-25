<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicetypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicetypeTable Test Case
 */
class ServicetypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ServicetypeTable
     */
    public $Servicetype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.servicetype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Servicetype') ? [] : ['className' => 'App\Model\Table\ServicetypeTable'];
        $this->Servicetype = TableRegistry::get('Servicetype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Servicetype);

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
