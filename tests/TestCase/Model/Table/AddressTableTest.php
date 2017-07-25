<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddressTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddressTable Test Case
 */
class AddressTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AddressTable
     */
    public $Address;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.address'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Address') ? [] : ['className' => 'App\Model\Table\AddressTable'];
        $this->Address = TableRegistry::get('Address', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Address);

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
