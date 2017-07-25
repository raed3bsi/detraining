<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonTable Test Case
 */
class PersonTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonTable
     */
    public $Person;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.person'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Person') ? [] : ['className' => 'App\Model\Table\PersonTable'];
        $this->Person = TableRegistry::get('Person', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Person);

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
