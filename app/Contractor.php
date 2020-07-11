<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{

	public function certifications()
	{
		return $this->hasMany('App\Certification', 'contractor_id', 'id');
	}
}
