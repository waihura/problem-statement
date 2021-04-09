<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'country',
        'city',
        'phone',
        'email',
        'status',
        'products'
    ];

      /**
     * Set the products
     *
     */
     public function setProductsAttribute($value)
     {
        $this->attributes['products'] = json_encode($value);

     }
   
     /**
      * Get the products
      *
      */
     public function getProductsAttribute($value)
     {
        return json_decode($value);
     }
}
