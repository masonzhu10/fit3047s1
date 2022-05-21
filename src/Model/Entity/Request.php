<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $dob
 * @property int|null $height
 * @property int|null $weight
 * @property string|null $current_med
 * @property string|null $allergies
 * @property string|null $medicare_num
 * @property string|null $parent_name
 * @property string|null $phone_no
 * @property string|null $email
 * @property string|null $address
 * @property string|null $password
 */
class Request extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'dob' => true,
        'height' => true,
        'weight' => true,
        'current_med' => true,
        'allergies' => true,
        'medicare_num' => true,
        'parent_name' => true,
        'phone_no' => true,
        'email' => true,
        'address' => true,
        'password' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
