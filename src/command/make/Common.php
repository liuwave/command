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

class Common extends Make
{
    protected $type = "Controller";
    
    protected function configure()
    {
    
        parent::configure();
        $this->addOption('api', null, Option::VALUE_NONE, 'Generate an api  class.')
          ->addOption('plain', null, Option::VALUE_NONE, 'Generate an empty  class.')
          ->addOption('site', null, Option::VALUE_NONE, 'Generate an site  class.')
          ->addOption('key', null, Option::VALUE_OPTIONAL, '主键');
        
    }
    protected function getStub()
    {
        $stubPath = __DIR__ . DIRECTORY_SEPARATOR . 'stubs' . DIRECTORY_SEPARATOR;
        if ($this->input->getOption('api')) {
            return $stubPath . strtolower($this->type).'.api.stub';
        }
        
        if ($this->input->getOption('plain')) {
            return $stubPath . strtolower($this->type).'.plain.stub';
        }
        if ($this->input->getOption('site')) {
            return $stubPath . strtolower($this->type).'.site.stub';
        }
        
        
        
        
        return $stubPath . strtolower($this->type).'.stub';
    }
    
    protected function getNamespace($appNamespace, $module)
    {
        return parent::getNamespace($appNamespace, $module) . '\\'.strtolower($this->type);
    }
    
    protected function buildClass($name)
    {
        
        
        
        $stub = file_get_contents($this->getStub());
        
        $namespace = trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');
        
        $class = str_replace($namespace . '\\', '', $name);
        
        
        
        
        $primaryKey=$this->input->getOption('key')?$this->input->getOption('key'):parse_name($class,0).'_id';;
        
        
        return str_replace(['{%className%}', '{%actionSuffix%}', '{%namespace%}', '{%app_namespace%}','{%primary_key%}'], [
          $class,
          Config::get('action_suffix'),
          $namespace,
          App::getNamespace(),
          $primaryKey
        ], $stub);
    }
}