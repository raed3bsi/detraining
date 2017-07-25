<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersontypeFixture
 *
 */
class PersontypeFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'persontype';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'persontypeid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'persontypename' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'persontypelabel' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sgroupid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_persontype_securitygroup_idx' => ['type' => 'index', 'columns' => ['sgroupid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['persontypeid'], 'length' => []],
            'persontypename_UNIQUE' => ['type' => 'unique', 'columns' => ['persontypename'], 'length' => []],
            'persontypelabel_UNIQUE' => ['type' => 'unique', 'columns' => ['persontypelabel'], 'length' => []],
            'fk_persontype_securitygroup' => ['type' => 'foreign', 'columns' => ['sgroupid'], 'references' => ['securitygroup', 'sgroupid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'persontypeid' => 1,
            'persontypename' => 'Lorem ipsum dolor sit amet',
            'persontypelabel' => 'Lorem ipsum dolor sit amet',
            'sgroupid' => 1
        ],
    ];
}
