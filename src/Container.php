<?php
namespace Tonis\Hookline;

class Container
{
    /** @var \SplPriorityQueue */
    private $hooks;
    /** @var string */
    private $instanceOf;

    public function __construct($instanceOf = null)
    {
        $this->hooks = new \SplPriorityQueue();
        $this->instanceOf = $instanceOf ? $instanceOf : HookInterface::class;
    }

    /**
     * @param mixed $hook
     * @param int $priority
     */
    public function add($hook, $priority = 0)
    {
        if (!$hook instanceof $this->instanceOf) {
            throw new Exception\InvalidHookException(
                sprintf('Hooks registered with this container must be an instance of %s', $this->instanceOf)
            );
        }
        $this->hooks->insert($hook, $priority);
    }

    /**
     * @param mixed ...$args Variable list of arguments to pass to hook method.
     * @throws Exception\MissingMethodException for invalid method calls to hooks.
     * @return \SplQueue
     */
    public function run()
    {
        $args = func_get_args();

        if (empty($args)) {
            throw new Exception\MissingMethodException('Calls to run() must include a method to run');
        }

        $method = array_shift($args);
        $response = new \SplQueue();

        foreach (clone $this->hooks as $hook) {
            $response->enqueue(call_user_func_array([$hook, $method], $args));
        }

        return $response;
    }
}
