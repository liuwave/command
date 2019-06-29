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
        $this->addOption('stub', null, Option::VALUE_OPTIONAL, 'Generate an api  class.')
          ->addOption('key', null, Option::VALUE_OPTIONAL, '主键');
        
    }
    protected function getStub()
    {
        $defaultPath=__DIR__ . DIRECTORY_SEPARATOR . 'stubs' . DIRECTORY_SEPARATOR;
        $userStubPath=Config::get('command.stub_path');
        
        
        $filename=strtolower($this->type);
        if($this->input->getOption('stub')){
            $filename .='.'.$this->input->getOption('stub').'.stub';
        }
        else{
            $filename.='.stub';
        }
        
        if(!empty($userStubPath)){
            $userStubPath=str_replace(['\\','/'],DIRECTORY_SEPARATOR,$userStubPath);
            $userStubPath=rtrim($userStubPath,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$filename;
            if(file_exists($userStubPath)){
                return $userStubPath;
            }
            else{
                $this->output->writeln('<tips>' .$userStubPath . ' 不存在，尝试加载默认设置</tips>');
                
            }
        }
        
        $defaultPath.=$filename;
        
        if(!file_exists($defaultPath)){
            $this->output->writeln('<error>' .$defaultPath . ' not exists!</error>');
            return false;
        }
        return $defaultPath;
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