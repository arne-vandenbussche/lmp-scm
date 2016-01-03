<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $first_name
 * @property string $address
 * @property string $postcode
 * @property string $city
 * @property string $country
 * @property string $email1
 * @property string $email2
 * @property string $phone
 * @property string $year_stop
 * @property string $remarks
 * @property bool $valid
 */
class Person extends Entity
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
        'id' => false,
    ];
}
