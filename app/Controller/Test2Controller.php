<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\DemoService;
use App\Service\UserServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

/**
 * @Controller()
 */
class Test2Controller
{
    /**
     * @Inject
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * @var DemoService;
     */
    private $demoService;

    public function __construct(DemoService $demoService)
    {
        $this->demoService = $demoService;
    }

    // Hyperf 会自动为此方法生成一个 /test2/index 的路由，允许通过 GET 或 POST 方式请求
    /**
     * @RequestMapping(path="index", methods="get,post")
     */
    public function index(RequestInterface $request)
    {
        // 从请求中获得 id 参数
        $id = $request->input('id', 2);
        return (string)$id;
    }

    /**
     * @RequestMapping(path="index2", methods="get,post")
     */
    public function index2()
    {
       //测试抽象注入
        return $this->userService->getInfoById(9);
    }

    /**
     * @RequestMapping(path="index3", methods="get,post")
     */
    public function index3()
    {
        //测试事件监听
        return $this->userService->register();
    }

    /**
     * @RequestMapping(path="index4", methods="get,post")
     */
    public function index4()
    {
        //测试日志组件
        return $this->demoService->logTest();
    }

}