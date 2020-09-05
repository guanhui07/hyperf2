<?php


namespace App\Dao;


use App\Model\User;

class UserDao
{
    public function first(int $id)
    {
        return User::query()->find($id);
    }

    /**
     *  测试模型缓存
     * @param int $id
     * @return User|\Hyperf\Database\Model\Model|null
     */
    public function firstCache(int $id)
    {
        return User::findFromCache($id);
    }

    public function findCache(array $ids)
    {
        return User::findManyFromCache($ids);
    }
}