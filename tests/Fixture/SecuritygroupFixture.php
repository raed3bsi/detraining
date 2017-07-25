<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SecuritygroupFixture
 *
 */
class SecuritygroupFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'securitygroup';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'sgroupid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sgroupname' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sgroupstatus' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'Active', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'parent_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sgtypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_securitygroup_sgtype_idx' => ['type' => 'index', 'columns' => ['sgtypeid'], 'length' => []],
            'fk_securitygroup_parent_idx' => ['type' => 'index', 'columns' => ['parent_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['sgroupid'], 'length' => []],
            'sgroupname_UNIQUE' => ['type' => 'unique', 'columns' => ['sgroupname'], 'length' => []],
            'fk_securitygroup_parent' => ['type' => 'foreign', 'columns' => ['parent_id'], 'references' => ['securitygroup', 'sgroupid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_securitygroup_sgtype' => ['type' => 'foreign', 'columns' => ['sgtypeid'], 'references' => ['sgrouptype', 'sgtypeid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'sgroupid' => 1,
            'sgroupname' => 'Lorem ipsum dolor sit amet',
            'sgroupstatus' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'parent_id' => 1,
            'sgtypeid' => 1
        ],
    ];
}
