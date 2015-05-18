<?php
namespace Tonis\Hookline;

trait HooksAwareTrait
{
    /** @var HookContainer */
    private $hooks;

    /**
     * @return HookContainer
     */
    public function hooks()
    {
        if (!$this->hooks instanceof HookContainer) {
            $this->hooks = new HookContainer();
        }
        return $this->hooks;
    }
}
