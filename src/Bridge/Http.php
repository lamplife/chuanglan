<?php

declare(strict_types = 1);

/**
 * Author: 狂奔的螞蟻 <www.firstphp.com>
 * Date: 2019/10/17
 * Time: 3:56 PM
 */

namespace Firstphp\Chuanglan\Bridge;

use Hyperf\Guzzle\ClientFactory;

class Http
{
    const BASE_URI = 'http://222.73.117.158/';

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
    protected $client;


    public function __construct(array $config = [], ClientFactory $clientFactory)
    {
        $baseUri = isset($config['url']) && $config['url'] ? $config['url'] : static::BASE_URI;
        $options = [
            'base_uri' => $baseUri,
            'timeout' => 2.0,
            'verify' => false,
        ];
        $this->client = $clientFactory->create($options);
    }


    public function setAccount($account)
    {
        $this->account = $account;
    }


    public function setPswd($pwd)
    {
        $this->pwd = $pwd;
    }


    public function __call($name, $arguments)
    {
        if ($this->account) {
            $arguments[0] .= (stripos($arguments[0], '?') ? '&' : '?') . 'account=' . $this->account;
        }
        if ($this->pwd) {
            $arguments[0] .= (stripos($arguments[0], '?') ? '&' : '?') . 'pswd=' . $this->pwd;
        }
        $response = $this->client->request($name, $arguments[0], $arguments[1])->getBody()->getContents();

        return $this->execResult($response);
    }


    /**
     * 处理返回值
     */
    public function execResult($result)
    {
        $result = preg_split("/[,\r\n]/", $result);
        return $result;
    }

}