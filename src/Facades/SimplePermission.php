<?php

namespace Pancini\SimplePermission\Facades;

use Illuminate\Support\Facades\Facade;

class SimplePermission extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'simplepermission';
    }
}
