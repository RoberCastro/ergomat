<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $fillable = [
    'quantity', 'date_stock', 'available', 'inactive', 'loaned', 'reparation', 'ordered'
  ];

  public function products()
  {
    return $this->hasMany('App\Product');
  }

}
