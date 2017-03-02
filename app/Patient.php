<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
        // ATTRIBUS
	protected $fillable = ['reference'];

	public function loans()
	{
		return $this->hasMany('App\Loan');
	}

	public function sales()
	{
		return $this->hasMany('App\Sale');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

}
