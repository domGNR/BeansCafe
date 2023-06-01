<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DB::table('products')->get();
        // return Product::with('category')->latest()->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = '';
        if ($request->hasFile("cover_image")) {
            $file = $request->file("cover_image");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("cover/"), $imageName);


            $product = new Product([
                "name" => $request->name,
                "description" => $request->description,
                "stock_qty" => $request->stock_qty,
                "cover" => $imageName,
                "price" => $request->price,
                "is_show" => $request->active == 'on' ? true : false,
                "brand_id" => $request->brand_id,
                "category_id" => $request->category_id
            ]);
            $product->save();
            $id = $product->id;
            if ($request->hasFile("images")) {
                $files = $request->file("images");
                foreach ($files as $file) {
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move(\public_path("/images"), $imageName);
                    $photo=new Photo([
                        "product_id"=>$id,
                        "url"=>$imageName
                    ]);
                    $photo->save();
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
