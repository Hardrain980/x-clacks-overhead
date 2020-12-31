<?php

namespace Leo\Middlewares;

use \Psr\Http\Server\MiddlewareInterface;
use \Psr\Http\Server\RequestHandlerInterface;
use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;

class XClacksOverhead implements MiddlewareInterface
{
	/**
	 * @var array<string> Names passed by clacks
	 */
	private array $names;

	public function __construct(array $names)
	{
		$this->names = $names;
	}

	public function process(
		ServerRequestInterface $request,
		RequestHandlerInterface $handler
	):ResponseInterface
	{
		$names = implode(', ', $this->names);

		return $handler->handle($request)
			->withHeader('X-Clacks-Overhead', "GNU {$names}");
	}
}

?>
