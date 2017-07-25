<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BusinessunitHasEntitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BusinessunitHasEntitiesTable Test Case
 */
class BusinessunitHasEntitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BusinessunitHasEntitiesTable
     */
    public $BusinessunitHasEntities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.businessunit_has_entities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BusinessunitHasEntities') ? [] : ['className' => 'App\Model\Table\BusinessunitHasEntitiesTable'];
        $this->BusinessunitHasEntities = TableRegistry::get('BusinessunitHasEntities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BusinessunitHasEntities);

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
