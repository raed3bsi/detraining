<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exchangerate Entity
 *
 * @property int $exchangeid
 * @property \Cake\I18n\Time $exchangedate
 * @property int $fromcurrency
 * @property int $tocurrency
 * @property float $exchangerate
 * @property float $inverserate
 *
 * @property \App\Model\Entity\Journalentry[] $journalentry
 */
class Exchangerate extends Entity
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
        'exchangeid' => false
    ];
}
