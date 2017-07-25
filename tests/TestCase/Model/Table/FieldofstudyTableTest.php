<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FieldofstudyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FieldofstudyTable Test Case
 */
class FieldofstudyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FieldofstudyTable
     */
    public $Fieldofstudy;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fieldofstudy'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fieldofstudy') ? [] : ['className' => 'App\Model\Table\FieldofstudyTable'];
        $this->Fieldofstudy = TableRegistry::get('Fieldofstudy', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fieldofstudy);

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
