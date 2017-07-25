<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestiondifficultyTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestiondifficultyTable Test Case
 */
class QuestiondifficultyTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestiondifficultyTable
     */
    public $Questiondifficulty;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.questiondifficulty'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Questiondifficulty') ? [] : ['className' => 'App\Model\Table\QuestiondifficultyTable'];
        $this->Questiondifficulty = TableRegistry::get('Questiondifficulty', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Questiondifficulty);

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
