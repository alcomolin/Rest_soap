<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $datos = Product::select("name", "description", "price", "stock", "id")->get();
            return response()->json($datos, 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id = null)
    {
        $product = [];
        $validations = [];
        $msg = "";
        if (isset($request->product_name) && $id !== null) {
            $product["name"] = $request->product_name;
        } else if (!isset($request->product_name)) {
            $validations['product_name'] = 'required';
        } else {
            $product["name"] = $request->product_name;
        }

        if (isset($request->product_description) && $id !== null) {
            $product["description"] = $request->product_description;
        } else if (!isset($request->product_description)) {
            $validations['product_description'] = 'required';
        } else {
            $product["description"] = $request->product_description;
        }

        if (isset($request->product_price) && $id !== null) {
            $product["price"] = $request->product_price;
        } else if (!isset($request->product_price)) {
            $validations['product_price'] = 'required';
        } else {
            $product["price"] = $request->product_price;
        }

        if (isset($request->product_stock) && $id !== null) {
            $product["stock"] = $request->product_stock;
        } else if (!isset($request->product_stock)) {
            $validations['product_stock'] = 'required';
        } else {
            $product["stock"] = $request->product_stock;
        }

        try {
            if ($id) {
                Product::where('id', $id)->update($product);
                $msg = "Product updated";
            } else {
                if (!$validations) {
                    Product::create($product);
                    $msg = "Product Created";
                } else {
                    $msg = $validations;
                }
            }
            return response()->json(["msg" => $msg], 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validations = [];
        if (!isset($request->product_id)) {
            $validations['product_id'] = 'required';
        }

        try {
            if (!$validations) {
                if (Product::where('id', $request->product_id)->exists()) {
                    Product::destroy($request->product_id);
                    $msg = "Product deleted successfully.";
                }
                else {
                    $msg = "Product id has not been assigned";
                }
            } else {
                $msg = $validations;
            }
            /* Delete a product */
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return response()->json(["msg" => $msg], 200);
    }
}
