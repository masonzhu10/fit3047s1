<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\RecordsTableTable;
use Authorization\IdentityInterface;
use Cake\ORM\TableRegistry;

/**
 * RecordsTable policy
 */
class RecordsTablePolicy
{
    public function scopeIndex($user, $query)
    {
        $users = TableRegistry::getTableLocator()->get('users');
        $user = $users->get($user->getIdentifier());
        if($user->type === 'volunteer') {
            return $query;
        }else if($user->type === 'patient') {

            return $query->where(['Records.users_id IS' => $user->id]);
        }else if($user->type === 'researcher') {
            //todo: add researcher_id to user table
            //return $query->where(['Records.research_id IS' => $user->researcher_id]);
            return $query;
        }
    }

}
