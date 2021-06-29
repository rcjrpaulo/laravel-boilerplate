<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    use HasFactory;

	protected $table = 'permissions';

	protected $fillable = [
		'name',
		'label',
		'group_label'
	];

	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}
}
