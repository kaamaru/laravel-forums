<?php namespace B50\Forums\Users\Group;

use B50\Forums\Core\Repositories\EloquentRepo;

/**
 * Interface UserGroupInterface
 *
 * @package B50\Forums\Users
 */
class EloquentUserGroupRepo extends EloquentRepo implements UserGroupRepoInterface
{
    /**
     * @param EloquentUserGroup $userGroup
     */
    public function __construct(EloquentUserGroup $userGroup)
    {
        $this->model = $userGroup;
    }

    /**
     * {@inheritDocs}
     */
    public function getForUser($userId)
    {
        return $this->model->where('user_id', $userId)->get();
    }

    /**
     * {@inheritDocs}
     */
    public function addToGroup($group, $userId)
    {
        return $this->model->updateOrCreate(['group' => $group, 'user_id' => $userId]);
    }
}
