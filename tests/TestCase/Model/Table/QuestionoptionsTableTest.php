<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionoptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionoptionsTable Test Case
 */
class QuestionoptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionoptionsTable
     */
    public $Questionoptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.questionoptions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Questionoptions') ? [] : ['className' => 'App\Model\Table\QuestionoptionsTable'];
        $this->Questionoptions = TableRegistry::get('Questionoptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Questionoptions);

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
