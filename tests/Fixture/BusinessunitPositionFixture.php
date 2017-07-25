<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BusinessunitPositionFixture
 *
 */
class BusinessunitPositionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'businessunit_position';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'positionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'businessunitid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'personid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'businessunitpositionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sgroupid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_positions_has_businessunit_businessunit1_idx' => ['type' => 'index', 'columns' => ['businessunitid'], 'length' => []],
            'fk_positions_has_businessunit_positions1_idx' => ['type' => 'index', 'columns' => ['positionid'], 'length' => []],
            'fk_positions_has_businessunit_user1_idx' => ['type' => 'index', 'columns' => ['personid'], 'length' => []],
            'fk_businessunitposition_securitygroup_idx' => ['type' => 'index', 'columns' => ['sgroupid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['businessunitpositionid'], 'length' => []],
            'fk_businessunitposition_businessunit' => ['type' => 'foreign', 'columns' => ['businessunitid'], 'references' => ['businessunit', 'businessunitid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_businessunitposition_person' => ['type' => 'foreign', 'columns' => ['personid'], 'references' => ['person', 'personid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_businessunitposition_position' => ['type' => 'foreign', 'columns' => ['positionid'], 'references' => ['positions', 'positionid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_businessunitposition_securitygroup' => ['type' => 'foreign', 'columns' => ['sgroupid'], 'references' => ['securitygroup', 'sgroupid'], 'update' => 'noAction', 'delete' => 'setNull', 'length' => []],
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
            'positionid' => 1,
            'businessunitid' => 1,
            'personid' => 1,
            'businessunitpositionid' => 1,
            'sgroupid' => 1
        ],
    ];
}
