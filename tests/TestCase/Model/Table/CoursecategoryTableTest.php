<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoursecategoryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoursecategoryTable Test Case
 */
class CoursecategoryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CoursecategoryTable
     */
    public $Coursecategory;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coursecategory'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Coursecategory') ? [] : ['className' => 'App\Model\Table\CoursecategoryTable'];
        $this->Coursecategory = TableRegistry::get('Coursecategory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Coursecategory);

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
