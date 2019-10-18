<?php

declare(strict_types = 1);

/**
 * Author: 狂奔的螞蟻 <www.firstphp.com>
 * Date: 2019/10/17
 * Time: 3:57 PM
 */

namespace Firstphp\Chuanglan;

use Firstphp\Chuanglan\Bridge\Http;
use Psr\Container\ContainerInterface;

class ChuanglanClient implements ChuanglanInterface
{

    /**
     * @var array
     */
    protected $remindMsg = [
        '0' => '发送成功',
        '101' => '无此用户',
        '102' => '密码错',
        '103' => '提交过快',
        '104' => '系统忙',
        '105' => '敏感短信',
        '106' => '消息长度错',
        '107' => '错误的手机号码',
        '108' => '手机号码个数错',
        '109' => '无发送额度',
        '110' => '不在发送时间内',
        '111' => '超出该账户当月发送额度限制',
        '112' => '无此产品',
        '113' => 'extno格式错',
        '115' => '自动审核驳回',
        '116' => '签名不合法，未带签名',
        '117' => 'IP地址认证错',
        '118' => '用户没有相应的发送权限',
        '119' => '用户已过期',
        '120' => '内容不是白名单',
    ];

    /**
     * @var array
     */
    protected $config;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $account;

    /**
     * @var string
     */
    protected $pwd;

    /**
     * @var object
     */
    protected $http;

    /**
     * @var ContainerInterface
     */
    protected $container;


    public function __construct(array $config = [], ContainerInterface $container)
    {
        $config = $config ? $config : config('chuanglan_sms');
        if ($config) {
            $this->url = $config['url'];
            $this->account = $config['account'];
            $this->pwd = $config['pwd'];
        }
        $this->http = $container->make(Http::class, compact('config'));
        $this->http->setAccount($this->account);
        $this->http->setPswd($this->pwd);
    }


    /**
     * 发送短信
     *
     * @param int $mobile
     * @param string $msg
     * @param bool $needstatus
     */
    public function sendSms(int $mobile, string $msg, bool $needstatus = true)
    {
        $result = $this->http->post('msg/HttpBatchSendSM', [
            'json' => [
                'msg' => $msg,
                'mobile' => $mobile,
                'needstatus' => $needstatus
            ]
        ]);
        $result['msg'] = $this->remindMsg[$result[1]];

        return $result;
    }


    public function queryBalance()
    {
        $result = $this->http->post('msg/QueryBalance', [
            'json' => []
        ]);

        return $result;
    }
}