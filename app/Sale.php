<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  protected $fillable = [
    'date_sale', 'price'
  ];


  // RELATIONS
  public function patient()
  {
    return $this->belongsTo('App\Patient');
  }

  public function products()
  {
    return $this->belongsToMany('App\Product')->withPivot('quantity_sale')->withTimestamps();
  }
}
