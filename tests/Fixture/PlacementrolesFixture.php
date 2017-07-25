<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlacementrolesFixture
 *
 */
class PlacementrolesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'roleid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ptestid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'courseid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'mingrade' => ['type' => 'float', 'length' => 0, 'precision' => 0, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => ''],
        'maxgrade' => ['type' => 'float', 'length' => 0, 'precision' => 0, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'fk_placementroles_placementtest1_idx' => ['type' => 'index', 'columns' => ['ptestid'], 'length' => []],
            'fk_placementroles_course1_idx' => ['type' => 'index', 'columns' => ['courseid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['roleid'], 'length' => []],
            'fk_placementroles_course1' => ['type' => 'foreign', 'columns' => ['courseid'], 'references' => ['course', 'courseid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_placementroles_placementtest1' => ['type' => 'foreign', 'columns' => ['ptestid'], 'references' => ['placementtest', 'ptestid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'roleid' => 1,
            'ptestid' => 1,
            'courseid' => 1,
            'mingrade' => 1,
            'maxgrade' => 1
        ],
    ];
}
