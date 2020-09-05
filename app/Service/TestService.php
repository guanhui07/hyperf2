<?php


namespace App\Service;


use App\Model\User;
use Hyperf\Cache\Annotation\Cacheable;
use Hyperf\Cache\Annotation\CachePut; //每次调用都会执行函数体

class TestService
{
    /**
     * @Cacheable(prefix="user", ttl=9000, listener="user-update")
     */
    public function user($id)
    {
        $user = User::query()->where('id',$id)->first();

        if($user){
            return $user->toArray();
        }

        return null;
    }
}
