<?php
/**
 * Created by PhpStorm.
 * User: liuwave
 * Date: 2019/6/29 16:13
 * Description:
 */

\think\Console::addDefaultCommands([
  'hello'	=>	'liuwave\ThinkCommand\command\Hello',
  'make:controller'	=>	'liuwave\ThinkCommand\command\make\Controller',
  'make:model'	=>	'liuwave\ThinkCommand\command\make\Model',
  'make:validate'	=>	'liuwave\ThinkCommand\command\make\Validate',

]);