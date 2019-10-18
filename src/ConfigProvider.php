<?php

declare(strict_types=1);

/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace Firstphp\Chuanglan;

use Firstphp\Chuanglan\Factory\ChuanglanFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                ChuanglanInterface::class => ChuanglanFactory::class
            ],
            'commands' => [
            ],
            'scan' => [
                'paths' => [
                    __DIR__,
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config for chuanglan-sms.',
                    'source' => __DIR__ . '/publish/chuanglan_sms.php',
                    'destination' => BASE_PATH . '/config/autoload/chuanglan_sms.php',
                ],
            ],
        ];
    }
}
