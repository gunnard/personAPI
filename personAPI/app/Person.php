<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $fillable = [
		'first_name',
		'last_name',
		'age',
		'email',
		'interests',
		'admission_date',
		'admission_time',
		'is_active'
	];
}
