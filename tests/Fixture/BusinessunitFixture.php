<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BusinessunitFixture
 *
 */
class BusinessunitFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'businessunit';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'businessunitid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'superunitid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'butypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'businessunitname' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'businessunitstatus' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => 'active', 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'modelid' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'entityid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_businessunit_businessunit1_idx' => ['type' => 'index', 'columns' => ['superunitid'], 'length' => []],
            'fk_businessunit_businessunittype1_idx' => ['type' => 'index', 'columns' => ['butypeid'], 'length' => []],
            'fk_businessunit_model_idx' => ['type' => 'index', 'columns' => ['modelid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['businessunitid'], 'length' => []],
            'fk_businessunit_businessunit1' => ['type' => 'foreign', 'columns' => ['superunitid'], 'references' => ['businessunit', 'businessunitid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_businessunit_businessunittype' => ['type' => 'foreign', 'columns' => ['butypeid'], 'references' => ['businessunittype', 'butypeid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'fk_businessunit_model' => ['type' => 'foreign', 'columns' => ['modelid'], 'references' => ['appmodel', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'businessunitid' => 1,
            'superunitid' => 1,
            'butypeid' => 1,
            'businessunitname' => 'Lorem ipsum dolor sit amet',
            'businessunitstatus' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'modelid' => 1,
            'entityid' => 1
        ],
    ];
}
