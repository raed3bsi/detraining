<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StructurelevelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StructurelevelTable Test Case
 */
class StructurelevelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StructurelevelTable
     */
    public $Structurelevel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.structurelevel'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Structurelevel') ? [] : ['className' => 'App\Model\Table\StructurelevelTable'];
        $this->Structurelevel = TableRegistry::get('Structurelevel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Structurelevel);

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
