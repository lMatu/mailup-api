<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProduct($id)
    {
        try {
            $product = Product::where('id', $id)->get();

            if (!empty($product[0])) {
                return response()->json(['code' => '000', 'message' => '', 'data' => new ProductCollection($product)], 201);
            } else {
                return response()->json(['code' => '001', 'message' => 'Producto no encontrado'], 401);
            }
        } catch (Exception $e) {
            return response()->json(['code' => '002', 'message' => 'Error. Contacte con el administrador'], 500);
        }
    }

    public function getAllProducts()
    {
        try {
            $product = Product::all();

            //Obtengo todos los productos, armo la colección y realizo la paginación
            $productData = (new ProductCollection($product))->paginate(5);

            return response()->json(['code' => '000', 'message' => '', 'data' => $productData], 201);
        } catch (Exception $e) {
            return response()->json(['code' => '002', 'message' => 'Error. Contacte con el administrador'], 500);
        }
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
            $product = $request->all();

            //Determino el nombre de la imagen que va a ir a BD
            $image = $request->image->getClientOriginalName();
            $product['image'] = $image;

            //Creo el producto, si esta todo bien, muevo la imagen a la carpeta public/images
            Product::create($product);
            $request->image->move(public_path('images/products'), $image);
            return response()->json(['code' => '000', 'message' => 'Producto creado con éxito'], 201);
        } catch (Exception $e) {
            return response()->json(['code' => '002', 'message' => 'Error. Contacte con el administrador'], 500);
        }
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
            //Obtengo el producto a actualizar
            $product = Product::where('id', $request->id)->first();

            if ($product) {
                //Si obtengo el producto, guardo los datos que provienen del request en una variable
                $new_product = $request->all();

                $image = $request->image->getClientOriginalName();
                //Si la imagen que viene en la request no es la misma que tenia en BD, lo guardo y modifico el nombre en BD
                if ($image !== $product->image) {
                    $new_product['image'] = $image;
                    $request->image->move(public_path('images/products'), $image);
                } else {
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
    public function deleteProduct($id)
    {
        try {
            //Obtengo el producto
            $product = Product::where('id', $id)->first();

            if ($product) {
                //Debido a que tengo el Softdelete, no se elimina directamente, sino que se marca como eliminado
                $product->delete();
                return response()->json(['code' => '000', 'message' => 'Producto eliminado con éxito'], 201);
            } else {
                return response()->json(['code' => '001', 'message' => 'Producto no encontrado para eliminar'], 401);
            }
        } catch (Exception $e) {
            return response()->json(['code' => '002', 'message' => 'Error. Contacte con el administrador'], 500);
        }
    }
}
