<?php


namespace App\Service;


use App\Event\UserRegistered;
use App\Model\User;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Event\EventDispatcher;
use Psr\EventDispatcher\EventDispatcherInterface;


class UserService implements UserServiceInterface
{
    /**
     * @Inject()
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param int $id
     * @return array
     */
    public function getInfoById(int $id) :array
    {
        return ['name'=>'test','id'=>$id];
    }

    public function register()
    {
        // 我们假设存在 User 这个实体
//        $user = new User();
//        $result = $user->save();
        $user = new \stdClass();
        $user->name = 'test';
        $result = mt_rand(1,90000);
        // 完成账号注册的逻辑
        // 这里 dispatch(object $event) 会逐个运行监听该事件的监听器
        file_put_contents('/tmp/a1.txt',date('Y-m-d H:i:s').'test11111111'."\r\n",FILE_APPEND);
        $this->eventDispatcher->dispatch(new UserRegistered($user));
        // $this->eventDispatcher->dispatch(new UserRegistered($user));

        return $result;
    }
}