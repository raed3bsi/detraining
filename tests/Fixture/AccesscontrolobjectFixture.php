<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AccesscontrolobjectFixture
 *
 */
class AccesscontrolobjectFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'accesscontrolobject';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'modelname' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'aconame' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'permissionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'the permission under which the action subsumed', 'precision' => null, 'autoIncrement' => null],
        'findername' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'custom finder name (a method that changes the query by adding some conditions)', 'precision' => null, 'fixed' => null],
        'actionname' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'actionargs' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'action arguments as a slash separated values', 'precision' => null, 'fixed' => null],
        'actiontype' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '[checkparent],[checkid],[checkides],[checkresult]

comma separated options', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_aco_permission_idx' => ['type' => 'index', 'columns' => ['permissionid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_aco_permission' => ['type' => 'foreign', 'columns' => ['permissionid'], 'references' => ['permission', 'permissionid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'modelname' => 'Lorem ipsum dolor sit amet',
            'aconame' => 'Lorem ipsum dolor sit amet',
            'permissionid' => 1,
            'findername' => 'Lorem ipsum dolor sit amet',
            'actionname' => 'Lorem ipsum dolor sit amet',
            'actionargs' => 'Lorem ipsum dolor sit amet',
            'actiontype' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
