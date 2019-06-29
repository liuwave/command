# command

thinkphp 创建类库文件 扩展


# 安裝

`composer require liuwave/command`


# 配置

可修改配置文件 修改项目根目录下config/command.php中 stub_path ，指定stub模板文件目录,可为空

若指定stub_path,需要添加指定的stub文件

- controller.sub
- model.sub
- validate.sub

## controller.sub 文件示例
```php
<?php

namespace {%namespace%};

use think\Controller;

class {%className%} extends Controller
{
    //
}

```
## model.sub 文件示例

```php
<?php

namespace {%namespace%};

use think\Model;

class {%className%} extends Model
{
    //

}

```

## model.sub 文件示例

```php
<?php

namespace {%namespace%};

use think\Validate;

class {%className%} extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];
}

```

# stub 默认替换字段

- {%className%} ： 类名
- {%actionSuffix%}： TP5 配置中的 action_suffix值
- {%namespace%} ： 指定的命名空间
- {%app_namespace%} ： TP5的app命名空间
- {%primary_key%} ： 自定义指定的 key值



# 使用

````

php think make:controller index/Index [--stub plain] [--key primary_id]

php think make:model  common/User  [--stub plain] [--key primary_id]

php think make:validate   common/User  [--stub plain] [--key primary_id]
````

# 参数
- --stub  指定加载的stub文件名称，例如php think make:controller  index/Index  --stub plain，将加载 stub模板文件目录/controller.plain.sub ,可为空
- --key 指定替换stub文件中{%primary_key%}的值
