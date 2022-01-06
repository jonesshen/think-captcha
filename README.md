# think-captcha
thinkphp5.1 验证码类库

此版本克隆自 [top-think/think-captcha](https://github.com/top-think/think-captcha)

## 安装
> composer require jonesshen/think-captcha

## 使用

### 模板里输出验证码
首先要在你应用的路由定义文件中，注册一个验证码路由规则
~~~
\think\facade\Route::get('captcha/[:id]', "\\think\\captcha\\CaptchaController@index");
~~~
然后就可以在模板文件中使用
~~~
<div>{:captcha_img()}</div>
~~~
或者
~~~
<div><img src="{:captcha_src()}" alt="captcha" /></div>
~~~
> 上面两种的最终效果是一样的

### 控制器里验证
手动验证（推荐）
~~~
if (!captcha_check($captcha)) {
    //验证失败
}
~~~
~~TP5的内置验证功能~~（此版本captcha规则不再内置）
~~~
$this->validate($data, [
    'captcha|验证码' => 'require|captcha'
]);
~~~
如需兼容使用，需要在应用公共文件中注册captcha规则
~~~
\think\facade\Validate::extend('captcha', function($value, $id = '') {
    return captcha_check($value, $id);
});
\think\facade\Validate::setTypeMsg('captcha', ':attribute错误!');
~~~
