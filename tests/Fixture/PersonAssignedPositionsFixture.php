<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PersonAssignedPositionsFixture
 *
 */
class PersonAssignedPositionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'personid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'positionid' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'validfrom' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'validuntil' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'if null then the assignment would be valid forever unless invalidated manually.', 'precision' => null],
        'assignmentstatus' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'draft=not approved by the creator.
pending=approved by the creator but waiting for subsequent approvals.
active=valid
suspended=temporary stoped.
invalid=totally removed.', 'precision' => null],
        'activatedon' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'actual date of activation', 'precision' => null],
        'invalidatedon' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'the date of invalidation', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'personid' => 1,
            'positionid' => 1,
            'validfrom' => '2016-11-14 23:52:41',
            'validuntil' => '2016-11-14 23:52:41',
            'assignmentstatus' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'activatedon' => '2016-11-14 23:52:41',
            'invalidatedon' => '2016-11-14 23:52:41'
        ],
    ];
}
