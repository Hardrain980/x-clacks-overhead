<?php

use \Leo\Middlewares\XClacksOverhead;
use \Leo\Fixtures\DummyRequestHandler;
use \PHPUnit\Framework\TestCase;
use \GuzzleHttp\Psr7;

/**
 * @testdox X-Clacks-Overhead
 */
class XClacksOverheadTest extends TestCase
{
	private const NAMES = ['Dennis Ritchie', 'Ian Murdock'];
	private const EXPECT = 'GNU Dennis Ritchie, Ian Murdock';

	function testClacksWithMultipleNames():void
	{
		$middleware = new XClacksOverhead(self::NAMES);
		$request = new Psr7\ServerRequest('GET', '/');
		$handler = new DummyRequestHandler();

		$this->assertSame(
			self::EXPECT,
			$middleware->process($request, $handler)
				->getHeaderLine('X-Clacks-Overhead')
		);
	}
}

?>
