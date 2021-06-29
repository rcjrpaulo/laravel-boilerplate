<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
	use SoftDeletes;
	protected $table = 'roles';

	protected $fillable = [
		'name',
		'label'
	];

	public function permissions()
	{
		return $this->belongsToMany(Permission::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
