<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = "user_permissions";

    protected $fillable = ['user_id','permission_id'];

	public function User()
	{
		return $this->hasOne('App\Models\User','user_id','id');
	}
}
