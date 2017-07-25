<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionanswerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionanswerTable Test Case
 */
class QuestionanswerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionanswerTable
     */
    public $Questionanswer;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.questionanswer'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Questionanswer') ? [] : ['className' => 'App\Model\Table\QuestionanswerTable'];
        $this->Questionanswer = TableRegistry::get('Questionanswer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Questionanswer);

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
