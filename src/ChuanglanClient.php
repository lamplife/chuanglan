<?php

declare(strict_types=1);

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
    }

    /**
     * 发送短信
     *
     * @param int $mobile
     * @param string $msg
     * @param bool $needstatus
     */
    public function sendSms(int $mobile, string $msg, bool $needstatus=true) {
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



    public function queryBalance() {
        $result = $this->http->post('msg/QueryBalance', [
            'json' => []
        ]);

        return $result;
    }
}