<?php
namespace Tonis\Hookline;

use Tonis\Hookline\TestAsset\TestHook;

/**
 * @coversDefaultClass \Tonis\Hookline\Container
 */
class ContainerTest extends \PHPUnit_Framework_TestCase
{
    /** @var Container */
    private $hooks;

    /**
     * @covers ::__construct
     * @covers ::add
     */
    public function testAdd()
    {
        $obj = new \StdClass();

        $this->hooks->add(new TestHook());

        $result = $this->hooks->run('foo', $obj);

        $this->assertInstanceOf('SplQueue', $result);
        $this->assertSame($obj, $result->top());
    }

    /**
     * @covers ::add
     * @expectedException \Tonis\Hookline\Exception\InvalidHookException
     * @expectedExceptionMessage Hooks registered with this container must be an instance of Tonis\Hookline\HookInterface
     */
    public function testAddThrowsExceptionOnInvalidHook()
    {
        $this->hooks->add(new \StdClass());
    }

    /**
     * @covers ::run
     * @expectedException \Tonis\Hookline\Exception\MissingMethodException
     * @expectedExceptionMessage Calls to run() must include a method to run
     */
    public function testRunThrowsExceptionForMissingMethod()
    {
        $this->hooks->run();
    }

    /**
     * @covers ::run
     */
    public function testRun()
    {
        $obj = new \StdClass();

        $this->hooks->add(new TestHook());

        $result = $this->hooks->run('foo', $obj);

        $this->assertInstanceOf('SplQueue', $result);
        $this->assertSame($obj, $result->top());
    }

    protected function setUp()
    {
        $this->hooks = new Container();
    }
}
