# Laravel PHP Framework

- laravel框架自己带的 php artisan serve  默认启动的 localhost:8000 的服务 在每次修该过的配置都需要`重新启动`才可以生效。

- 怎加一个高可用的打印函数

```
/**
 * 打印输出数据|show的别名
 * @param void $var
 */
function p($var)
{
    if (is_bool($var)) {
        var_dump($var);
    } else if (is_null($var)) {
        var_dump(NULL);
    } else {
        echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>" . print_r($var, true) . "</pre>";
    }
}
```


