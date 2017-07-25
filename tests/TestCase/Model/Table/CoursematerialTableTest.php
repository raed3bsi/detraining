<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoursematerialTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoursematerialTable Test Case
 */
class CoursematerialTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CoursematerialTable
     */
    public $Coursematerial;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coursematerial'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Coursematerial') ? [] : ['className' => 'App\Model\Table\CoursematerialTable'];
        $this->Coursematerial = TableRegistry::get('Coursematerial', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Coursematerial);

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
