<?php

declare(strict_types=1);

/**
 * Author: 狂奔的螞蟻 <www.firstphp.com>
 * Date: 2019/10/17
 * Time: 3:57 PM
 */

namespace Firstphp\Chuanglan;


interface ChuanglanInterface
{

    /**
     * 发送短信
     *
     * @param int $mobile
     * @param string $msg
     * @param bool $needstatus
     * @return mixed
     */
    public function sendSms(int $mobile, string $msg, bool $needstatus=true);


    /**
     * 查询额度
     *
     * @return mixed
     */
    public function queryBalance();


}