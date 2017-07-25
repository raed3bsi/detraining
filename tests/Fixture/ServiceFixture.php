<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ServiceFixture
 *
 */
class ServiceFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'service';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'serviceid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'stypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'serviceprice' => ['type' => 'decimal', 'length' => 15, 'precision' => 6, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'service unit price'],
        'pricecurrency' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_service_stype_idx' => ['type' => 'index', 'columns' => ['stypeid'], 'length' => []],
            'fk_service_currency_idx' => ['type' => 'index', 'columns' => ['pricecurrency'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['serviceid'], 'length' => []],
            'fk_service_currency' => ['type' => 'foreign', 'columns' => ['pricecurrency'], 'references' => ['currency', 'currencyid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_service_stype' => ['type' => 'foreign', 'columns' => ['stypeid'], 'references' => ['servicetype', 'stypeid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'serviceid' => 1,
            'stypeid' => 1,
            'serviceprice' => 1.5,
            'pricecurrency' => 1
        ],
    ];
}
