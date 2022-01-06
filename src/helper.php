<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2015 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

use think\captcha\Captcha;
use think\facade\Config;
use think\facade\Url;

if (!function_exists('captcha')) {
    /**
     * @param string $id
     * @param array $config
     * @return \think\Response
     */
    function captcha($id = '', $config = []) {
        $captcha = new Captcha($config);
        return $captcha->entry($id);
    }
}

if (!function_exists('captcha_src')) {
    /**
     * @param string $id
     * @return string
     */
    function captcha_src($id = '') {
        return Url::build('/captcha' . ($id ? '/' . $id : ''));
    }
}

if (!function_exists('captcha_img')) {
    /**
     * @param string $id
     * @return string
     */
    function captcha_img($id = '') {
        return '<img src="' . captcha_src($id) . '" alt="captcha" />';
    }
}

if (!function_exists('captcha_check')) {
    /**
     * @param mixed $value
     * @param string $id
     * @return bool
     */
    function captcha_check($value, $id = '') {
        $captcha = new Captcha((array) Config::pull('captcha'));
        return $captcha->check($value, $id);
    }
}
