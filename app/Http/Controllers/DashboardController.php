<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
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

    public function __construct(UserController $userController,BrandController $brandController)
    {
        $this->userController = $userController;
        $this->brandController = $brandController;
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

    public function showUsers()
    {
        $users = $this->userController->index();
        return view('dashboard.users.show', compact('users'));
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
        return redirect(route('dashboard.users.show'))->with('message', 'L\'utente stato modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyUser(User $user)
    {
        //
    }


    public function showBrands()
    {
        $brands = $this->brandController->index();
        return view('dashboard.brands.show', compact('brands'));
    }


    public function createBrand()
    {
        return view('dashboard.brands.add');
    }


    public function storeBrand(Request $request)
    {
        $this->brandController->store($request);
        return redirect()->route('dashboard.brands.show')->with('success','Brand aggiunto correttamente.');
    }

    public function editBrand(Brand $brand)
    {
        return view('dashboard.brands.edit', compact('brand'));
    }

    public function updateBrand(Request $request, Brand $brand)
    {
        $this->brandController->update($request,$brand);
        return redirect(route('dashboard.brands.show'))->with('message', 'L\'utente stato modificato correttamente');
    }


    public function destroyBrand(Brand $brand)
    {
        $this->brandController->destroy($brand);
        return redirect(route("dashboard.brands.show"))->with('message', "$brand->name è stato eliminato");
    }

}
