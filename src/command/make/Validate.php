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

class Validate extends Common
{
    protected $type = "Validate";

    protected function configure()
    {
        parent::configure();
        $this->setName('make:validate')
          ->setDescription('Create a validate class');
    }


}
