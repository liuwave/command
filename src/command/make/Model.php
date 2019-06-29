<?php
/**
 * Created by PhpStorm.
 * User: liuwave
 * Date: 2019/6/28 21:09
 * Description:
 */

namespace liuwave\ThinkCommand\command\make;

use think\console\command\Make;
use think\console\input\Option;
use think\facade\App;
use think\facade\Config;

class Model extends Common
{
    protected $type = "Model";

    protected function configure()
    {
        parent::configure();
        $this->setName('make:model')
          ->setDescription('Create a new model class');
    }

    
}
