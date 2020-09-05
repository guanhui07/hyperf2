<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\HttpServer\Contract\ResponseInterface;

/**
 * @Controller()
 */
class AopController extends AbstractController
{
    /**
     * @RequestMapping(path="index", methods="get,post")
     */
    public function index(ResponseInterface $response)
    {
        //Aop测试切面 FooAspect 对此结果进行切面处理
        return $response->raw('Hello Hyperf.测试')
            ->withHeader('Content-type','text/html;charset=utf-8');
        //return 'hello_aop' .  "测试";
    }

    /**
     * @RequestMapping(path="index2", methods="get,post")
     */
    public function index2()
    {
        try {
            $bool = true;
            if ($bool) {
                throw new \Exception('exception error');
            }
            return 'hello_aop';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
