<?php
namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function find($id);

    public function paginate($request);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function destroy($id);

}