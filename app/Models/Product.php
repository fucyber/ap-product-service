<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
  use SoftDeletes;

  protected $table = 'products';
  protected $key = 'id';

  protected $fillable = [
      'id',
      'prd_no',
      'image',
      'published',
      'name',
      'short_description',
      'detail',
      'price',
      'discount_price',
  ];

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = [
      'created_at',
      'updated_at',
      'deleted_at'
  ];

  protected $hidden = ['deleted_at'];


    public function scopePrd_no($query, $prdNo)
    {
        return $query->where('prd_no', 'like', '%' . $prdNo . '%');
    }

    public function scopePublished($query, $published)
    {
        return $query->where('published', '=', $published);
    }

    public function scopeName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }

}
