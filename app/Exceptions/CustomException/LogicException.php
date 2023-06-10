<?php

namespace App\Exceptions\CustomException;

use Exception;

class LogicException extends Exception
{
    public function __construct($messages='Logic Exception',$statusCode=422,$previous=null)
    {
        parent::__construct($messages,$statusCode,$previous);
    }
}
