<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TporganizationFixture
 *
 */
class TporganizationFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tporganization';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'organizationid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'organizationname' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'addressid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'organizationdescription' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'orgtypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'structureid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_tporganization_tporgtype_idx' => ['type' => 'index', 'columns' => ['orgtypeid'], 'length' => []],
            'fk_tporganization_address_idx' => ['type' => 'index', 'columns' => ['addressid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['organizationid'], 'length' => []],
            'fk_tporganization_address' => ['type' => 'foreign', 'columns' => ['addressid'], 'references' => ['address', 'addressid'], 'update' => 'noAction', 'delete' => 'setNull', 'length' => []],
            'fk_tporganization_tporgtype' => ['type' => 'foreign', 'columns' => ['orgtypeid'], 'references' => ['tporganizationtype', 'orgtypeid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'organizationid' => 1,
            'organizationname' => 'Lorem ipsum dolor sit amet',
            'addressid' => 1,
            'organizationdescription' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'orgtypeid' => 1,
            'structureid' => 1
        ],
    ];
}
