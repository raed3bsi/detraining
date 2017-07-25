<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppactionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppactionTable Test Case
 */
class AppactionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppactionTable
     */
    public $Appaction;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.appaction'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Appaction') ? [] : ['className' => 'App\Model\Table\AppactionTable'];
        $this->Appaction = TableRegistry::get('Appaction', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Appaction);

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
