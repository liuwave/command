<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 刘志淳 <chun@engineer.com>
// +----------------------------------------------------------------------

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
