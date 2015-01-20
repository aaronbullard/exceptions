<?php namespace Aaronbullard\Exceptions;

use Exception, ReflectionClass;
use Aaronbullard\Exceptions\Contracts\ExceptionHandlerInterface;

abstract class ExceptionHandler implements ExceptionHandlerInterface {

	/**
	 * Handle the exception
	 *
	 * @param $exception
	 * @return mixed
	 */
	public function handle(Exception $exception)
	{
		$exceptionName = $this->getExceptionName($exception);

		if ($this->handlerIsRegistered($exceptionName))
		{
			return call_user_func([$this, 'handle'.$exceptionName], $exception);
		}

		throw $exception;
	}

	/**
	 * Figure out what the name of the class is.
	 *
	 * @param $exception
	 * @return string
	 */
	protected function getExceptionName(Exception $exception)
	{
		return (new ReflectionClass($exception))->getShortName();
	}

	/**
	 * Determine if a method in the subclass is registered
	 * for this particular exception.
	 *
	 * @param $exceptionName
	 * @return bool
	 */
	protected function handlerIsRegistered($exceptionName)
	{
		$method = "handle{$exceptionName}";

		return method_exists($this, $method);
	}

}