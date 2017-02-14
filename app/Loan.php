<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
	'date_start', 'date_end'
	];

    // RELATIONS
	public function patient()
	{
		return $this->belongsTo('App\Patient');
	}

	public function products()
	{
		return $this->belongsToMany('App\Product');
	}
}