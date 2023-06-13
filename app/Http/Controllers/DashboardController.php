<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $userController;
    private $brandController;
    private $categoryController;
    private $productController;

    public function __construct(UserController $userController,BrandController $brandController,CategoryController $categoryController,ProductController $productController)
    {
        $this->userController = $userController;
        $this->brandController = $brandController;
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
        return view('dashboard.home');
    }

    public function indexUsers()
    {
        $users = $this->userController->index();
        return view('dashboard.users.index', compact('users'));
    }

    public function editUser(User $user)
    {
         $user = $this->userController->edit($user);
         return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, User $user)
    {
        $this->userController->update($request,$user);
        return redirect(route('dashboard.users.index'))->with('message', 'L\'utente stato modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyUser(User $user)
    {
        //
    }


    public function indexBrands()
    {
        $brands = $this->brandController->index();
        return view('dashboard.brands.index', compact('brands'));
    }

    public function storeBrand(Request $request)
    {
        $this->brandController->store($request);
        return redirect()->route('dashboard.brands.index')->with('success','Brand aggiunto correttamente.');
    }

    public function editBrand(Brand $brand)
    {
        return view('dashboard.brands.edit', compact('brand'));
    }

    public function updateBrand(Request $request, Brand $brand)
    {
        $this->brandController->update($request,$brand);
        return redirect(route('dashboard.brands.index'))->with('message', 'L\'utente stato modificato correttamente');
    }


    public function destroyBrand(Brand $brand)
    {
        $this->brandController->destroy($brand);
        return redirect(route("dashboard.brands.index"))->with('message', "$brand->name è stato eliminato");
    }


    public function indexCategories()
    {
        $categories = $this->categoryController->index();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $this->categoryController->store($request);
        return redirect()->route('dashboard.categories.index')->with('success','category aggiunto correttamente.');
    }

    public function editCategory(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        $this->categoryController->update($request,$category);
        return redirect(route('dashboard.categories.index'))->with('message', 'L\'utente stato modificato correttamente');
    }


    public function destroyCategory(Category $category)
    {
        $this->categoryController->destroy($category);
        return redirect(route("dashboard.categories.index"))->with('message', "$category->name è stato eliminato");
    }

    //Products
    public function indexProducts()
    {
        $products = $this->productController->index();
        //dd($products);
        $categories = $this->categoryController->index();
        $brands = $this->brandController->index();
        return view('dashboard.products.index', compact('products','categories','brands'));
    }

    public function storeProduct(Request $request)
    {
        $this->productController->store($request);
        return redirect()->route('dashboard.products.index')->with('success','product aggiunto correttamente.');
    }

    public function editProduct(Product $product)
    {
        $categories = $this->categoryController->index();
        $brands = $this->brandController->index();
        return view('dashboard.products.edit', compact('product','categories','brands'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $this->productController->update($request,$product);
        return redirect(route('dashboard.products.index'))->with('message', 'Il prodotto è stato modificato correttamente');
    }


    public function destroyProduct(Product $product)
    {
        $this->productController->destroy($product);
        return redirect(route("dashboard.products.index"))->with('message', "$product->name è stato eliminato");
    }

}
