<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PositiontemplateTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PositiontemplateTable Test Case
 */
class PositiontemplateTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PositiontemplateTable
     */
    public $Positiontemplate;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.positiontemplate'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Positiontemplate') ? [] : ['className' => 'App\Model\Table\PositiontemplateTable'];
        $this->Positiontemplate = TableRegistry::get('Positiontemplate', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Positiontemplate);

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
