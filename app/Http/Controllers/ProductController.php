<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepositoryInterface;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{

    protected $Product;

    public function __construct(ProductRepositoryInterface $product){
        $this->Product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $products = $this->Product->paginate($request->all());
      return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
      $result = $this->Product->create($request->all());
      if (!$result) {
          return response()->json([
              'success' => false,
              'message' => __('message.operationFailed')
          ], 400);
      }

      return response()->json([
        'success' => true,
        'message' => __('message.saveSuccess'),
        'data' => $result
      ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $result = $this->Product->find($id);
      if (!$result) {
          return response()->json([
              'success' => false,
              'message' => __('message.dataNotFound')
          ], 400);
      }

      return response()->json([
        'success' => true,
        'message' => __('message.success'),
        'data' => $result
      ], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
      $result = $this->Product->update($id, $request->all());
      if (!$result) {
          return response()->json([
              'success' => false,
              'message' => __('message.operationFailed')
          ], 400);
      }

      return response()->json([
        'success' => true,
        'message' => __('message.saveSuccess'),
        'data' => $request->all()
      ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $result = $this->Product->destroy($id);
      if (!$result) {
          return response()->json([
              'success' => false,
              'message' => __('message.operationFailed')
          ], 400);
      }

      return response()->json([
        'success' => true,
        'message' => __('message.deleteSuccess')
      ], 200);
    }
}
