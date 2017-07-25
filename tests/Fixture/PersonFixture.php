<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonFixture
 *
 */
class PersonFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'person';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'personid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'personname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'dateofbirth' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'mobile' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'workphone' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'addressid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'educationlevelid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'gender' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'registrationdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'persontype' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_person_address_idx' => ['type' => 'index', 'columns' => ['addressid'], 'length' => []],
            'fk_person_educationlevel_idx' => ['type' => 'index', 'columns' => ['educationlevelid'], 'length' => []],
            'fk_person_persontype_idx' => ['type' => 'index', 'columns' => ['persontype'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['personid'], 'length' => []],
            'fk_person_address' => ['type' => 'foreign', 'columns' => ['addressid'], 'references' => ['address', 'addressid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_person_educationlevel' => ['type' => 'foreign', 'columns' => ['educationlevelid'], 'references' => ['educationlevel', 'educationlevelid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_person_persontype' => ['type' => 'foreign', 'columns' => ['persontype'], 'references' => ['persontype', 'persontypeid'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'personid' => 1,
            'personname' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet',
            'dateofbirth' => '2016-09-07',
            'mobile' => 'Lorem ipsum dolor ',
            'workphone' => 'Lorem ipsum dolor ',
            'addressid' => 1,
            'educationlevelid' => 1,
            'gender' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'registrationdate' => '2016-09-07',
            'persontype' => 1
        ],
    ];
}
