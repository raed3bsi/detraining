<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SecuritygroupPermissionsFixture
 *
 */
class SecuritygroupPermissionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'permissionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sgroupid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'permissiontype' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'allow', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_sgrouphaspermission_permission_idx' => ['type' => 'index', 'columns' => ['permissionid'], 'length' => []],
            'fk_sgrouphaspermission_sgroup_idx' => ['type' => 'index', 'columns' => ['sgroupid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'uq_sgrouphaspermission' => ['type' => 'unique', 'columns' => ['permissionid', 'sgroupid'], 'length' => []],
            'fk_sgrouphaspermission_permission' => ['type' => 'foreign', 'columns' => ['permissionid'], 'references' => ['permission', 'permissionid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'fk_sgrouphaspermission_sgroup' => ['type' => 'foreign', 'columns' => ['sgroupid'], 'references' => ['securitygroup', 'sgroupid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'permissionid' => 1,
            'sgroupid' => 1,
            'permissiontype' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
