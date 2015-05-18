<?php
namespace Tonis\Hookline;

interface HooksAwareInterface
{
    /**
     * @return HookContainer
     */
    public function hooks();
}
