<?php
/**
 * Created by PhpStorm.
 * User: liuwave
 * Date: 2019/6/28 21:09
 * Description:
 */
namespace liuwave\ThinkCommand\command\make;

use think\console\Command;
use think\console\command\Make;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;
use think\facade\Config;
use think\facade\App;

class Controller extends Common
{
    protected $type = "Controller";
    
    
    protected function configure()
    {
        parent::configure();
        $this->setName('make:controller')
          ->setDescription('Create a new resource controller class');
    }
    
    protected function getClassName($name)
    {
        return parent::getClassName($name) . (Config::get('controller_suffix') ? ucfirst(Config::get('url_controller_layer')) : '');
    }
    
 
   
}