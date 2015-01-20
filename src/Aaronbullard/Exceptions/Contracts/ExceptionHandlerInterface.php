<?php namespace Aaronbullard\Exceptions\Contracts;

use Exception;

interface ExceptionHandlerInterface {
	public function handle(Exception $exception);
}