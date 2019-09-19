<?php

namespace App\Pancini\Traits;

use Illuminate\Support\Facades\Auth;

trait CheckPermission
{
    /**
     * $user
     *
     * @var [type]
     */
    private $user = null;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * userHasPermission
     *
     * @param [type] $action
     *
     * @return boolean
     */
    public function userHasPermission($action = null): bool
    {
        return $this->user->permissions->where('permission', $action)->pluck('permission')->first() !== null;
    }
}
