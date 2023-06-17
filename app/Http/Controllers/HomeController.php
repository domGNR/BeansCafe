<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $productController;
    private $categoryController;
    public function __construct(CategoryController $categoryController, ProductController $productController)
    {
        $this->categoryController = $categoryController;
        $this->productController = $productController;
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('store.home');
    }

    public function indexShop()
    {
        $categories = $this->categoryController->index();
        $products = $this->productController->index();
        return view('store.shop', compact('categories', 'products'));
    }

    public function cart()
    {
        return view('store.cart');
    }
    
    function singleProduct(Product $product)
    {
        return view('store.single-product', compact('product'));
    }


}