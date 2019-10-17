<?php

declare(strict_types=1);

/**
 * 创蓝短信配置
 *
 * Author: 狂奔的螞蟻 <www.firstphp.com>
 * Date: 2019/10/17
 * Time: 4:01 PM
 */

return [
    /*
    |--------------------------------------------------------------------------
    | 创蓝API地址
    |--------------------------------------------------------------------------
    |
    */
    'url' => env('SMS_URL', 'http://222.73.117.158/'),
    /*
    |--------------------------------------------------------------------------
    | 创蓝API账号
    |--------------------------------------------------------------------------
    |
    */
    'account' => env('SMS_ACCOUNT', 'kewaike253'),
    /*
    |--------------------------------------------------------------------------
    | 创蓝API密码
    |--------------------------------------------------------------------------
    |
    */
    'pwd' => env('SMS_PWD', 'Er9_99slow4il'),

];
