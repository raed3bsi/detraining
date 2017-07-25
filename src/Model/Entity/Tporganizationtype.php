<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tporganizationtype Entity
 *
 * @property int $orgtypeid
 * @property string $orgtypename
 * @property string $orgtyperole
 * @property int $structureid
 */
class Tporganizationtype extends Entity
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
        'orgtypeid' => false
    ];
}
