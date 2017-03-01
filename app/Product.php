<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'name', 'description', 'side', 'price', 'pro_date_status','quantity'
	];





	// RELATIONS

	public function loans()
	{
		return $this->belongsToMany('App\Loan');
	}
}
