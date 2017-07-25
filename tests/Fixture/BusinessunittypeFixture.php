<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BusinessunittypeFixture
 *
 */
class BusinessunittypeFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'businessunittype';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'butypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'butypename' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'modelid' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'entityid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_butype_model_idx' => ['type' => 'index', 'columns' => ['modelid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['butypeid'], 'length' => []],
            'butypename_UNIQUE' => ['type' => 'unique', 'columns' => ['butypename'], 'length' => []],
            'fk_butype_model' => ['type' => 'foreign', 'columns' => ['modelid'], 'references' => ['appmodel', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'butypeid' => 1,
            'butypename' => 'Lorem ipsum dolor sit amet',
            'modelid' => 1,
            'entityid' => 1
        ],
    ];
}
