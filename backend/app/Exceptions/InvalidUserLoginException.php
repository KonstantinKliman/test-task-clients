<?php

namespace App\Exceptions;

use Exception;

class InvalidUserLoginException extends Exception
{
    protected $message = 'Неправильный пароль';
    protected $code = 401;
}
