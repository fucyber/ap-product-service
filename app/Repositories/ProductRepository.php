<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;


use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

  protected  $Product;

  public function __construct(Product $product)
  {
      $this->Product = $product;
  }


    public function find($id)
    {
      return $this->Product->find($id);
    }

    public function paginate($request)
    {
      $query   = $this->Product->query()->orderByRaw('id DESC');
      $fillable = $this->Product->getFillable();
      foreach ($request as $key => $value) {
          if (array_search($key, $fillable) !== false && !is_null($value)) {
              $query->{$key}($value);
          }
      }
      return $query->paginate(10);
    }

    public function create(array $attributes)
    {
      return $this->Product->create($attributes);
    }

    public function update($id,  array  $params)
    {
      return $this->Product->find($id)->update($params);
    }

    public function destroy($id)
    {
      return $this->Product->find($id)->destroy($id);
    }


}
