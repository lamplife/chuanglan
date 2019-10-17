<?php

declare(strict_types=1);

/**
 * Author: 狂奔的螞蟻 <www.firstphp.com>
 * Date: 2019/10/17
 * Time: 3:56 PM
 */

namespace Firstphp\Chuanglan\Factory;

use Firstphp\Chuanglan\ChuanglanClient;
use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;


class ChuanglanFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $contents = $container->get(ConfigInterface::class);
        $config = $contents->get("chuanglan_sms");
        return $container->make(ChuanglanClient::class, compact('config'));
    }
}



