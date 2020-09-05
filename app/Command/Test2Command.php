<?php

declare(strict_types=1);

namespace App\Command;

use _HumbugBox71425477b33d\Symfony\Component\Console\Input\InputArgument;
use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Psr\Container\ContainerInterface;


/**
 * @Command
 */
class Test2Command extends HyperfCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct('test2');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('Hyperf Demo Command');
        //必须参数
        $this->addArgument('name',InputArgument::REQUIRED,'名字');
    }

    public function handle()
    {
        $name = $this->input->getArgument('name');
        echo $name;
        $this->line('Hello Hyperf2', 'info');
    }
}
