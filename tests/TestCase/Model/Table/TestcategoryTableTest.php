<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestcategoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestcategoryTable Test Case
 */
class TestcategoryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestcategoryTable
     */
    public $Testcategory;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.testcategory'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Testcategory') ? [] : ['className' => 'App\Model\Table\TestcategoryTable'];
        $this->Testcategory = TableRegistry::get('Testcategory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Testcategory);

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
