<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PermissionFixture
 *
 */
class PermissionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'permission';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'permissionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'permissionname' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pgroupid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_permission_displaygroup_idx' => ['type' => 'index', 'columns' => ['pgroupid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['permissionid'], 'length' => []],
            'fk_permission_displaygroup' => ['type' => 'foreign', 'columns' => ['pgroupid'], 'references' => ['permissiongroup', 'pgroupid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'permissionid' => 1,
            'permissionname' => 'Lorem ipsum dolor sit amet',
            'pgroupid' => 1
        ],
    ];
}
