<?php

namespace App\Exceptions;

use Exception;

class InvalidUserPasswordException extends Exception
{
    protected $message = 'Неправильный пароль';
}
