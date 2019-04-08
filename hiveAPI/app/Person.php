<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	//

	protected $fillable = ['user_id', 'first_name', 'last_name', 'age', 'interests', 'admission_date', 'admission_time', 'is_active'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
