<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrganizationstructureTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrganizationstructureTable Test Case
 */
class OrganizationstructureTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrganizationstructureTable
     */
    public $Organizationstructure;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.organizationstructure'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Organizationstructure') ? [] : ['className' => 'App\Model\Table\OrganizationstructureTable'];
        $this->Organizationstructure = TableRegistry::get('Organizationstructure', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Organizationstructure);

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
