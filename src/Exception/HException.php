<?php

namespace HLPR\Exception;

use Exception;

class HException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
