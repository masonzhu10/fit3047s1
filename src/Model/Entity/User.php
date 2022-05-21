<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $password
 * @property string|null $type
 * @property int|null $volunteer_id
 * @property int|null $patient_id
 * @property int|null $researcher_id
 *  @property String $email
 *
 * @property \App\Model\Entity\Volunteer $volunteer
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\Researcher $researcher

 */
class User extends Entity
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
        'email'=> true,
        'password' => true,
        'type' => true,
        'volunteer_id' => true,
        'patient_id' => true,
        'researcher_id' => true,
        'volunteer' => true,
        'patient' => true,
        'researcher' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
