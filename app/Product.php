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
		return $this->belongsToMany('App\Loan')->withPivot('quantity_loan')->withTimestamps();
	}
	public function commandes()
	{
		return $this->belongsToMany('App\Commande')->withPivot('quantity_comm')->withTimestamps();
	}


	public function statu()
	{
		return $this->belongsTo('App\Statu');
	}

	public function sales()
	{
		return $this->belongsToMany('App\Sale')->withPivot('quantity_sale')->withTimestamps();
	}
	public function categorie()
	{
		return $this->belongsTo('App\Categorie');
	}

}
