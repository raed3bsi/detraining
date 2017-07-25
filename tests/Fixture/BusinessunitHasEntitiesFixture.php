<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BusinessunitHasEntitiesFixture
 *
 */
class BusinessunitHasEntitiesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'businessunitid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modelid' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'entityid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_buhasentities_businessunit_idx' => ['type' => 'index', 'columns' => ['businessunitid'], 'length' => []],
            'fk_buhasentities_appmodel_idx' => ['type' => 'index', 'columns' => ['modelid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'uq_buhasentities' => ['type' => 'unique', 'columns' => ['modelid', 'entityid'], 'length' => []],
            'fk_buhasentities_appmodel' => ['type' => 'foreign', 'columns' => ['modelid'], 'references' => ['appmodel', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_buhasentities_businessunit' => ['type' => 'foreign', 'columns' => ['businessunitid'], 'references' => ['businessunit', 'businessunitid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'businessunitid' => 1,
            'modelid' => 1,
            'entityid' => 1
        ],
    ];
}
