<?php
namespace Tonis\Hookline;

trait HooksAwareTrait
{
    /** @var Container */
    private $hooks;

    /**
     * @return Container
     */
    public function hooks()
    {
        if (!$this->hooks instanceof Container) {
            $this->hooks = new Container();
        }
        return $this->hooks;
    }
}
