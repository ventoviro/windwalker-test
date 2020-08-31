<?php

/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2019 LYRASOFT.
 * @license    MIT
 */

declare(strict_types=1);

namespace Windwalker\Test\Traits\Reactor;

use Swoole\Event;

/**
 * The SwooleTestTrait class.
 */
trait SwooleTestTrait
{
    public function nextTick(): void
    {
        if ($this->swooleEnabled()) {
            Event::wait();
        }
    }

    /**
     * swooleEnabled
     *
     * @return  bool
     */
    public function swooleEnabled(): bool
    {
        return extension_loaded('swoole');
    }

    public function skipIfSwooleNotInstalled(): void
    {
        if (!$this->swooleEnabled()) {
            self::markTestSkipped('Swoole havn\'t installed');
        }
    }
}
