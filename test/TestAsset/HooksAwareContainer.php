<?php
namespace Tonis\Hookline\TestAsset;

use Tonis\Hookline\Container;
use Tonis\Hookline\HooksAwareInterface;
use Tonis\Hookline\HooksAwareTrait;

class HooksAwareContainer implements HooksAwareInterface
{
    use HooksAwareTrait;

    public function setHooks(Container $hooks)
    {
        $this->hooks = $hooks;
    }
}
