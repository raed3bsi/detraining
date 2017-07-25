<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExchangeratesFixture
 *
 */
class ExchangeratesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'exchangeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'exchangedate' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fromcurrency' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tocurrency' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'exchangerate' => ['type' => 'decimal', 'length' => 15, 'precision' => 6, 'unsigned' => false, 'null' => false, 'default' => '1.000000', 'comment' => ''],
        'inverserate' => ['type' => 'decimal', 'length' => 15, 'precision' => 6, 'unsigned' => false, 'null' => false, 'default' => '1.000000', 'comment' => ''],
        '_indexes' => [
            'fk_exchangerate_fromcurrency_idx' => ['type' => 'index', 'columns' => ['fromcurrency'], 'length' => []],
            'fk_exchangerate_tocurrency_idx' => ['type' => 'index', 'columns' => ['tocurrency'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['exchangeid'], 'length' => []],
            'uq_exchangerate' => ['type' => 'unique', 'columns' => ['exchangedate', 'fromcurrency', 'tocurrency'], 'length' => []],
            'fk_exchangerate_fromcurrency' => ['type' => 'foreign', 'columns' => ['fromcurrency'], 'references' => ['currency', 'currencyid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_exchangerate_tocurrency' => ['type' => 'foreign', 'columns' => ['tocurrency'], 'references' => ['currency', 'currencyid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'exchangeid' => 1,
            'exchangedate' => '2016-11-07',
            'fromcurrency' => 1,
            'tocurrency' => 1,
            'exchangerate' => 1.5,
            'inverserate' => 1.5
        ],
    ];
}
