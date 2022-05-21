<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Record;
use Authorization\IdentityInterface;
use Cake\ORM\TableRegistry;

/**
 * Record policy
 */
class RecordPolicy
{



    public function canIndex(IdentityInterface $user, Record $record){
        return true;
    }

    /**
     * Check if $user can add Record
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Record $record
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Record $record)
    {
        if($this->isVolunteer($user)) {
            return true;
        }else if($this->isPatient($user, $record)) {
            return true;
        }
        return false;
    }

    /**
     * Check if $user can edit Record
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Record $record
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Record $record)
    {
        if($this->isVolunteer($user)) {
            return true;
        }else if($this->isPatient($user, $record)) {
            return true;
        }
        return false;
    }

    /**
     * Check if $user can delete Record
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Record $record
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Record $record)
    {
        if($this->isVolunteer($user)) {
            return true;
        }else if($this->isPatient($user, $record)) {
            return true;
        }
        return false;
    }

    /**
     * Check if $user can view Record
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Record $record
     * @return bool
     */
    public function canView(IdentityInterface $user, Record $record)
    {
        if($this->isVolunteer($user)) {
            return true;
        }else if($this->isPatient($user, $record)) {
            return true;
        }else if($this->isResearcher($user, $record)) {
            return true;
        }
        return false;
    }

    protected function isPatient(IdentityInterface $user, Record $record): bool
    {
        $users = TableRegistry::getTableLocator()->get('users');
        $user = $users->get($user->getIdentifier());
        return $user->type === 'patient' && $user->id === $record->users_id;
    }

    protected function isVolunteer(IdentityInterface $user): bool
    {
        $users = TableRegistry::getTableLocator()->get('users');
        $user = $users->get($user->getIdentifier());
        return $user->type === 'volunteer';
    }

//    protected function isResearcher(IdentityInterface $user, Record $record): bool
//    {
//        $users = TableRegistry::getTableLocator()->get('users');
//        $user = $users->get($user->getIdentifier());
//        //return $user->type === 'researcher' && $user->researcher_id === $record->research_id;
//        return $user->type === 'researcher';
//    }
}
