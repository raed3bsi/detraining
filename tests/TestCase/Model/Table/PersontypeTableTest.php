<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersontypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersontypeTable Test Case
 */
class PersontypeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersontypeTable
     */
    public $Persontype;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.persontype'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Persontype') ? [] : ['className' => 'App\Model\Table\PersontypeTable'];
        $this->Persontype = TableRegistry::get('Persontype', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Persontype);

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
