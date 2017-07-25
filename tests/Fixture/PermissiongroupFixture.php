<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PermissiongroupFixture
 *
 */
class PermissiongroupFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'permissiongroup';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'pgroupid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'pgroupname' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'parentgroup' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_permissiongroup_parentgroup_idx' => ['type' => 'index', 'columns' => ['parentgroup'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['pgroupid'], 'length' => []],
            'fk_permissiongroup_parentgroup' => ['type' => 'foreign', 'columns' => ['parentgroup'], 'references' => ['permissiongroup', 'pgroupid'], 'update' => 'noAction', 'delete' => 'setNull', 'length' => []],
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
            'pgroupid' => 1,
            'pgroupname' => 'Lorem ipsum dolor sit amet',
            'parentgroup' => 1
        ],
    ];
}
