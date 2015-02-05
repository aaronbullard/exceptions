<?php namespace Aaronbullard\Exceptions;

use Exception;

class MethodNotAllowedException extends CoreException {
	const HTTP_CODE = 404;
	const DESCRIPTION = "A request was made of a resource using a request method not supported by that 
		resource; for example, using GET on a form which requires data to be presented via POST, 
		or using PUT on a read-only resource.";
}