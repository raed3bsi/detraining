<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvaltestTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvaltestTable Test Case
 */
class EvaltestTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EvaltestTable
     */
    public $Evaltest;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.evaltest'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Evaltest') ? [] : ['className' => 'App\Model\Table\EvaltestTable'];
        $this->Evaltest = TableRegistry::get('Evaltest', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Evaltest);

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
