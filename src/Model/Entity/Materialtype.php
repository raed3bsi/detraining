<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Materialtype Entity
 *
 * @property int $mtypeid
 * @property string $mtypename
 */
class Materialtype extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'mtypeid' => false
    ];
}
