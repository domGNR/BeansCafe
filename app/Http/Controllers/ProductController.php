<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return DB::table('products')->get();
        return Product::with('category')->get();
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
            $fileName = $this->getUniqueImageName($file);
            $file->move(\public_path("assets/store/images/products/"), $fileName);


            $product = new Product([
                "name" => $request->name,
                "description" => $request->description,
                "slug" => $request->slug,
                "stock_qty" => $request->stock_qty,
                "cover" => $fileName,
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
                    $fileName = $this->getUniqueImageName($file);
                    $file->move(\public_path("assets/store/images/products/"), $fileName);
                    $photo = new Photo([
                        "product_id" => $id,
                        "url" => $fileName
                    ]);
                    $photo->save();
                }
            }
        }
    }

    public function getUniqueImageName($file)
    {
        switch ($file->getMimeType()) {
            case 'image/jpeg':
                return bin2hex(random_bytes(8)) . '.jpg';
            case 'image/png':
                return bin2hex(random_bytes(8)) . '.png';
            case 'image/gif':
                return bin2hex(random_bytes(8)) . '.gif';
            default:
                break;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('store.show', compact('product'));
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

        $product->name = $request['name'];
        $product->slug = $request['slug'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->stock_qty = $request['stock_qty'];
        if($request->has('cover_image') && $request->hasFile("cover_image")){
            // remove cover
            $photoPath = public_path("assets\\store\\images\\products\\".$product->cover);
            $deletedFile = File::delete($photoPath);

            // insert new cover
            $file = $request->file("cover_image");
            $fileName = $this->getUniqueImageName($file);
            $file->move(\public_path("assets/store/images/products/"), $fileName);
            $product->cover = $fileName;
        }

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $fileName = $this->getUniqueImageName($file);
                $file->move(\public_path("assets/store/images/products/"), $fileName);
                $photo = new Photo([
                    "product_id" => $product->id,
                    "url" => $fileName
                ]);
                $photo->save();
            }
        }
        
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }


    public function destroyPhoto(Photo $photo)
    {
        $photo = Photo::findOrFail($photo['id']);
        $photoPath = public_path("assets\\store\\images\\products\\".$photo->url);
        $deletedFile = File::delete($photoPath);
        if ($deletedFile == null) {
           echo "File deleted";
        }
        $photo->delete();
    }

    public function destroyCover(Product $product)
    {
        $photoPath = public_path("assets\\store\\images\\products\\".$product->cover);
        $deletedFile = File::delete($photoPath);
        if ($deletedFile == null) {
           echo "File deleted";
        }
        $product->cover = null;
        $product->save();
    }


}
