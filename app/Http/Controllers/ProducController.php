<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProducController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Product::all();
        return view('welcome')->with("datos", $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id=null)
    {
        $product = [
            'name' => $request->product_name,
            'description' => $request->product_description,
            'price' => $request->product_price,
            'stock' => $request->product_stock
        ];
        if ($id) {
            Product::where('id', $id)->update($product);
        }
        else {
            Product::create($product);
        }
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datos = Product::where('id', $id)->first();
        return view('edit_product')->with("datos", $datos);
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
        $request->validate([
            'product_id' => 'required',
        ]);

        try {
            /* Delete a product */
            Product::destroy($request->product_id);
            $msg = "Product deleted successfully.";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        $datos = Product::all();
        return view('welcome')->with("datos", $datos);
    }
}
