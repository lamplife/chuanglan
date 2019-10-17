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

use Firstphp\Chuanglan\ChuanglanClient;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                ChuanglanInterface::class => ChuanglanClient::class
            ],
            'commands' => [
            ],
            'scan' => [
                'paths' => [
                    __DIR__,
                ],
            ],
        ];
    }
}
