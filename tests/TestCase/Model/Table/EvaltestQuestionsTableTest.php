<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvaltestQuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvaltestQuestionsTable Test Case
 */
class EvaltestQuestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EvaltestQuestionsTable
     */
    public $EvaltestQuestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.evaltest_questions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EvaltestQuestions') ? [] : ['className' => 'App\Model\Table\EvaltestQuestionsTable'];
        $this->EvaltestQuestions = TableRegistry::get('EvaltestQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EvaltestQuestions);

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
