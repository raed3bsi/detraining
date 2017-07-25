<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoursetopicTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoursetopicTable Test Case
 */
class CoursetopicTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CoursetopicTable
     */
    public $Coursetopic;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coursetopic'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Coursetopic') ? [] : ['className' => 'App\Model\Table\CoursetopicTable'];
        $this->Coursetopic = TableRegistry::get('Coursetopic', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Coursetopic);

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
