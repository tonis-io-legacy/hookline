<?php
namespace Tonis\Hookline\TestAsset;

use Tonis\Hookline\HookInterface;

class TestHook implements HookInterface
{
    public function foo($foo)
    {
        return $foo;
    }
}
