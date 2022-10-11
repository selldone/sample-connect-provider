<?php

namespace Selldone\provider\errors;

class ErrorResponse
{

    public static function Exception(\Exception $e)
    {
        return response($e->getMessage(),$e->getCode()?:500);
    }
}
