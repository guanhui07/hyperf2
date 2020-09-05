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
class Test3Command extends HyperfCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct('test3');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('Hyperf Demo Command');
        //可选 有默认值
        $this->addArgument('name',InputArgument::OPTIONAL,'名字','test3_3');
    }

    public function handle()
    {
        $name = $this->input->getArgument('name');
        echo $name;
        $this->line('Hello Hyperf2', 'info');
//        $this->output->writeln('test');
//        $this->output->choice('请选择',['test1','test2']);
//        $this->output->confirm('是吗',false);

         //进度条
//        $this->output->progressStart(100);
//        for ($i = 0;$i<10;$i--){
//            $this->output->progressAdvance(10);
//            sleep(1);
//        }
//        $this->output->progressFinish();
    }
}
