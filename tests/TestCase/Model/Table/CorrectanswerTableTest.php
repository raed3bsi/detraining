<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorrectanswerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorrectanswerTable Test Case
 */
class CorrectanswerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CorrectanswerTable
     */
    public $Correctanswer;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.correctanswer'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Correctanswer') ? [] : ['className' => 'App\Model\Table\CorrectanswerTable'];
        $this->Correctanswer = TableRegistry::get('Correctanswer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Correctanswer);

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
