<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlacementtestFixture
 *
 */
class PlacementtestFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'placementtest';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ptestid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'evaltestid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ptestnumber' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pteststatus' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => 'active or inactive', 'precision' => null, 'autoIncrement' => null],
        'documentid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'createdby' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'serviceid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ptestname' => ['type' => 'string', 'length' => 60, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_placementtest_evaltest1_idx' => ['type' => 'index', 'columns' => ['evaltestid'], 'length' => []],
            'fk_placementtest_document_idx' => ['type' => 'index', 'columns' => ['documentid'], 'length' => []],
            'fk_placementtest_owner_idx' => ['type' => 'index', 'columns' => ['createdby'], 'length' => []],
            'fk_placementtest_service_idx' => ['type' => 'index', 'columns' => ['serviceid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ptestid'], 'length' => []],
            'ptestnumber_UNIQUE' => ['type' => 'unique', 'columns' => ['ptestnumber'], 'length' => []],
            'ptestname_UNIQUE' => ['type' => 'unique', 'columns' => ['ptestname'], 'length' => []],
            'fk_placementtest_document' => ['type' => 'foreign', 'columns' => ['documentid'], 'references' => ['document', 'documentid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_placementtest_evaltest1' => ['type' => 'foreign', 'columns' => ['evaltestid'], 'references' => ['evaltest', 'testid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_placementtest_owner' => ['type' => 'foreign', 'columns' => ['createdby'], 'references' => ['user', 'userid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_placementtest_service' => ['type' => 'foreign', 'columns' => ['serviceid'], 'references' => ['service', 'serviceid'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'ptestid' => 1,
            'evaltestid' => 1,
            'ptestnumber' => 'Lorem ipsum dolor sit amet',
            'pteststatus' => 1,
            'documentid' => 1,
            'createdby' => 1,
            'serviceid' => 1,
            'ptestname' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
