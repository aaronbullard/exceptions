<?php namespace Aaronbullard\Exceptions;

use Exception;

class ForbiddenException extends CoreException {
	const HTTP_CODE = 404;
	const DESCRIPTION = "The requested resource could not be found 
		but may be available again in the future. Subsequent requests by the client are permissible.";
}