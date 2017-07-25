<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CourseversionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CourseversionTable Test Case
 */
class CourseversionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CourseversionTable
     */
    public $Courseversion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.courseversion'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Courseversion') ? [] : ['className' => 'App\Model\Table\CourseversionTable'];
        $this->Courseversion = TableRegistry::get('Courseversion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Courseversion);

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
