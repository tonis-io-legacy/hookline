<?php
namespace Tonis\Hookline;

use Tonis\Hookline\TestAsset\HooksAwareContainer;

/**
 * @coversDefaultClass \Tonis\Hookline\HooksAwareTrait
 */
class HooksAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::hooks
     */
    public function testHooksIsLazyLoaded()
    {
        $container = new HooksAwareContainer();
        $this->assertInstanceOf(Container::class, $container->hooks());
    }

    /**
     * @covers ::hooks
     */
    public function testHooks()
    {
        $hooks = new Container();

        $container = new HooksAwareContainer();
        $container->setHooks($hooks);

        $this->assertSame($hooks, $container->hooks());
    }
}
