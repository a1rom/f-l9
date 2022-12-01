<?php

namespace App\Exceptions;

use Exception;

class NoResourcesExeption extends Exception
{
    public function render()
    {
        return response()->json(answerWithData('Resource not found', 404), 404);
    }
}
