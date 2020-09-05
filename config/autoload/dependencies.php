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
return [
    //测试抽象对象注入
    \App\Service\UserServiceInterface::class => \App\Service\UserService::class,
    \Psr\EventDispatcher\EventDispatcherInterface::class => \Hyperf\Event\EventDispatcher::class,
];