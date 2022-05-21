<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Patient;
use Authorization\IdentityInterface;
use Authorization\Policy\BeforePolicyInterface;
use Cake\ORM\TableRegistry;

/**
 * Patient policy
 */
class PatientPolicy
{

    /**
     * Check if $user can add Patient
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Patient $patient
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Patient $patient)
    {
        if ($this->isVolunteer($user)) {
            return true;
        }
        return false;
    }

    /**
     * Check if $user can edit Patient
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Patient $patient
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Patient $patient)
    {
//        if ($this->isVolunteer($user)) {
//            return true;
//        }
        return true;
    }

    /**
     * Check if $user can delete Patient
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Patient $patient
     * @return bool
     */
    public function canIndex(IdentityInterface $user)
    {
        if ($this->isVolunteer($user)) {
            return true;
        }
        return false;
    }

    public function canDelete(IdentityInterface $user, Patient $patient)
    {
        if ($this->isVolunteer($user)) {
            return true;
        }
        return false;
    }

    /**
     * Check if $user can view Patient
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Patient $patient
     * @return bool
     */
    public function canView(IdentityInterface $user, Patient $patient)
    {
        if ($this->isVolunteer($user)) {
            return true;
        }else if($this->isPatient($user, $patient)){
            return true;
        }
        return false;
    }

protected function isVolunteer(IdentityInterface $user): bool
{
    $user = \Cake\Datasource\FactoryLocator::get('Table')->get('Users')->get($user->id, ['contain' => ['Volunteers']]);
    return $user->type === 'volunteer';
}

protected function isPatient(IdentityInterface $user, Patient $patient): bool
{
    $user = \Cake\Datasource\FactoryLocator::get('Table')->get('Users')->get($user->id, ['contain' => ['Patients']]);
    return $user->type === 'patient' && $user->patient_id === $patient->id;
}

}
