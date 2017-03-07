<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{

  protected $fillable = [
    'date_commande', 'tva', 'price'
  ];


  // GET SET
  public function getProductListAttribute()
  {
    return $this->products->pluck('id')->all();
  }
  public function getUserListAttribute()
  {
    return $this->products->pluck('id')->all();
  }

  // RELATIONS
  public function users()
  {
    return $this->belongsToMany('App\User');
  }

  public function products()
  {
    return $this->belongsToMany('App\Product')->withPivot('quantity_comm')->withTimestamps();
  }
}
