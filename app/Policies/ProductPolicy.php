<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\UserPermission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
	/**
	 * Determine whether the user can create product.
	 *
	 * @param  \App\User  $user
	 * @return mixed
	 */
	public function create(User $user)
	{
			$canCreate = FALSE;
			$permissionKey = config('constants.permissions.insert.key');
			if(UserPermission::where(['user_id'=> $user->id, 'permission_id' => $permissionKey])->exists()){
				$canCreate = TRUE;
			}
		return $canCreate;
	}

	/**
	 * Determine whether the user can update product.
	 *
	 * @param  \App\User  $user \App\Models\Product $product
	 * @return mixed
	 */
	public function update(User $user, Product $product)
	{
        $canCreate = FALSE;
        $permissionKey = config('constants.permissions.update.key');
        if(UserPermission::where(['user_id'=> $user->id, 'permission_id' => $permissionKey])->exists()){
            $canCreate = TRUE;
        }
        return $canCreate;
	}

    /**
     * Determine whether the user can delete product.
     *
     * @param  \App\User  $user \App\Models\Product $product
     * @return mixed
     */
	public function delete(User $user, Product $product)
	{
        $canCreate = FALSE;
        $permissionKey = config('constants.permissions.delete.key');
        if(UserPermission::where(['user_id'=> $user->id, 'permission_id' => $permissionKey])->exists()){
            $canCreate = TRUE;
        }
        return $canCreate;
	}

}
