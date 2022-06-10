<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProduct($id)
    {
        $product = Product::where('id', $id)->get();

        if ($product) {
            return response()->json(['code' => '000', 'message' => '', 'data' => new ProductCollection($product)], 401);
        } else {
            return response()->json(['code' => '001', 'message' => 'Producto no encontrado'], 401);
        }
    }

    public function getAllProducts()
    {
        $product = Product::all();

        return response()->json(['code' => '000', 'message' => '', 'data' => new ProductCollection($product)], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProduct(StoreProduct $request)
    {
        try {
            //Save image
            $product = $request->all();

            $image = $request->image->getClientOriginalName();
            $product['image'] = $image;
            //

            Product::create($product);
            $request->image->move(public_path('images/products'), $image);
            return response()->json(['code' => '000', 'message' => 'Producto creado con éxito'], 201);
        } catch (Exception $e) {
            return response()->json(['code' => '002', 'message' => 'Error. Contacte con el administrador'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(StoreProduct $request)
    {
        try {
            //Update image
            $product = Product::where('id', $request->id)->first();

            if ($product) {

                $new_product = $request->all();

                $image = $request->image->getClientOriginalName();

                if ($image !== $product->image) {
                    $new_product['image'] = $image;
                    $request->image->move(public_path('images/products'), $image);
                }else{
                    $new_product['image'] = $product->image;
                }

                $product->update($new_product);
                return response()->json(['code' => '000', 'message' => 'Producto actualizado con éxito'], 201);
            } else {
                return response()->json(['code' => '001', 'message' => 'Producto no encontrado'], 401);
            }
        } catch (Exception $e) {
            return response()->json(['code' => '002', 'message' => 'Error. Contacte con el administrador'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
