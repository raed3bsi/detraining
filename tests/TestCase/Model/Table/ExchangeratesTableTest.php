<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExchangeratesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExchangeratesTable Test Case
 */
class ExchangeratesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExchangeratesTable
     */
    public $Exchangerates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exchangerates',
        'app.journalentry',
        'app.journalentry_exchangerates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Exchangerates') ? [] : ['className' => 'App\Model\Table\ExchangeratesTable'];
        $this->Exchangerates = TableRegistry::get('Exchangerates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Exchangerates);

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
