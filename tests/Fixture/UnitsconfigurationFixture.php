<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UnitsconfigurationFixture
 *
 */
class UnitsconfigurationFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'unitsconfiguration';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'modelid' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'configas' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'unittypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'typeconfigid' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'typeref' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'parentmodel' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'parentref' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_unitconfig_butype_idx' => ['type' => 'index', 'columns' => ['unittypeid'], 'length' => []],
            'fk_unitconfig_typeconfig_idx' => ['type' => 'index', 'columns' => ['typeconfigid'], 'length' => []],
            'fk_unitconfig_parentmodel_idx' => ['type' => 'index', 'columns' => ['parentmodel'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'modelid_UNIQUE' => ['type' => 'unique', 'columns' => ['modelid'], 'length' => []],
            'fk_unitconfig_butype' => ['type' => 'foreign', 'columns' => ['unittypeid'], 'references' => ['businessunittype', 'butypeid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_unitconfig_model' => ['type' => 'foreign', 'columns' => ['modelid'], 'references' => ['appmodel', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_unitconfig_parentmodel' => ['type' => 'foreign', 'columns' => ['parentmodel'], 'references' => ['appmodel', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_unitconfig_typeconfig' => ['type' => 'foreign', 'columns' => ['typeconfigid'], 'references' => ['unitsconfiguration', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'modelid' => 1,
            'configas' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'unittypeid' => 1,
            'typeconfigid' => 1,
            'typeref' => 'Lorem ipsum dolor sit amet',
            'parentmodel' => 1,
            'parentref' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
