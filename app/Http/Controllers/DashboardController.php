<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Photo;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CategoryRequest;
use Illuminate\Database\QueryException;
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
    private $orderController;

    public function __construct(OrderController $orderController, UserController $userController, BrandController $brandController, CategoryController $categoryController, ProductController $productController)
    {
        $this->userController = $userController;
        $this->orderController = $orderController;
        $this->brandController = $brandController;
        $this->categoryController = $categoryController;
        $this->productController = $productController;
        $this->middleware('auth');
        $this->middleware(CheckRole::class . ':1');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.orders.index');
    }

    public function indexUsers()
    {
        $users = $this->userController->index();
        return view('dashboard.users.index', compact('users'));
    }

    public function editUser(User $user)
    {
        $user = $this->userController->edit($user);
        $roles = Role::all();
        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, User $user)
    {
        $this->userController->update($request, $user);
        return redirect(route('dashboard.users.index'))->with('success', 'L\'utente stato modificato correttamente');
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

    public function storeBrand(BrandRequest $request)
    {
        $this->brandController->store($request);
        return redirect()->route('dashboard.brands.index')->with('success', 'Brand aggiunto correttamente.');
    }

    public function editBrand(Brand $brand)
    {
        return view('dashboard.brands.edit', compact('brand'));
    }

    public function updateBrand(BrandRequest $request, Brand $brand)
    {
        $this->brandController->update($request, $brand);
        return redirect(route('dashboard.brands.index'))->with('success', 'L\'utente stato modificato correttamente');
    }


    public function destroyBrand(Brand $brand)
    {
        try {
        $this->brandController->destroy($brand);
        return redirect(route("dashboard.brands.index"))->with('success', "$brand->name è stato eliminato");
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Impossibile eliminare il record. È ancora vincolato ad altri record.');
        }

    }


    public function indexCategories()
    {
        $categories = $this->categoryController->index();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function storeCategory(CategoryRequest $request)
    {
        $this->categoryController->store($request);
        return redirect()->route('dashboard.categories.index')->with('success', 'category aggiunto correttamente.');
    }

    public function editCategory(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function updateCategory(CategoryRequest $request, Category $category)
    {
        $this->categoryController->update($request, $category);
        return redirect(route('dashboard.categories.index'))->with('success', 'L\'utente stato modificato correttamente');
    }


    public function destroyCategory(Category $category)
    {
        try {
            $this->categoryController->destroy($category);
            return redirect(route("dashboard.categories.index"))->with('success', "$category->name è stato eliminato");
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Impossibile eliminare il record. È ancora vincolato ad altri record.');
        }
    }

    //Products
    public function indexProducts()
    {
        $products = $this->productController->index();
        $categories = $this->categoryController->index();
        $brands = $this->brandController->index();
        return view('dashboard.products.index', compact('products', 'categories', 'brands'));
    }

    public function storeProduct(ProductRequest $request)
    {
        $this->productController->store($request);
        return redirect()->route('dashboard.products.index')->with('success', 'product aggiunto correttamente.');
    }

    public function editProduct(Product $product)
    {
        $categories = $this->categoryController->index();
        $brands = $this->brandController->index();
        return view('dashboard.products.edit', compact('product', 'categories', 'brands'));
    }

    public function updateProduct(ProductRequest $request, Product $product)
    {
        $this->productController->update($request, $product);
        return redirect(route('dashboard.products.index'))->with('success', 'Il prodotto è stato modificato correttamente');
    }


    public function destroyProduct(Product $product)
    {
        try {
            $this->productController->destroy($product);
            return redirect(route("dashboard.products.index"))->with('success', 'Record eliminato con successo.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Impossibile eliminare il record. È ancora vincolato ad altri record.');
        }
    }


    public function indexOrders(Product $product)
    {
        $orders = Order::all();
        $orderStatuses = OrderStatus::all();
        return view('dashboard.orders.index', compact(['orders', 'orderStatuses']));
    }


    function destroyPhoto(Photo $photo)
    {
        $this->productController->destroyPhoto($photo);
        return redirect()->back();
    }

    function destroyCover(Product $product)
    {
        $this->productController->destroyCover($product);
        return redirect()->back();
    }


    function editOrder(Order $order)
    {
        $this->orderController->edit($order);
        $orderStatuses = OrderStatus::all();
        return view('dashboard.orders.edit', compact(['order', 'orderStatuses']));
    }

    public function updateOrder(OrderRequest $request, Order $order)
    {
        $this->orderController->update($request, $order);
        return redirect(route('dashboard.orders.index'))->with('success', 'L\'ordine stato modificato correttamente');
    }
    

    function cancelOrder(Order $order)
    {
        try {
            $this->orderController->cancel($order);
            return redirect(route('dashboard.orders.index'))->with('success', 'Record eliminato con successo.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Impossibile eliminare il record. È ancora vincolato ad altri record.');
        }
    }

}