<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController()
 */
class TestController
{
    /**
     * @Inject()
     * @var UserService
     */
    private $userService;

    // Hyperf 会自动为此方法生成一个 /test/index 的路由，允许通过 GET 或 POST 方式请求
    public function index(RequestInterface $request)
    {
        // 从请求中获得 id 参数
        $id = $request->input('id', 12);
        return (string)$id;
    }

    /**
     * 测试 Inject
     * @param RequestInterface $request
     * @return array
     */
    public function index2(RequestInterface $request)
    {
        $id = $request->input('id', 10);
        return $this->userService->getInfoById((int)$id);
    }
}