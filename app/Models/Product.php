<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $title
 * @property $image
 * @property $description
 * @property $price
 * @property $offer
 * @property $inventory
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    static $rules = [
		'title' => 'required',
		'price' => 'required',
		'inventory' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['title','image','description','price','offer','inventory'];

    public function user(){
      return $this->hasOne(User::class); 
    }

}
