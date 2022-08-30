<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Get\GetController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\UserResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Cookie;

class CatalogController extends Controller
{
    public function index(Product $model)
    {
        $userData = new UserResource(auth()->user(User::with('role')->select('role')));
        if (isset($userData->role)) {
            $userRole = $userData->role->title;
        } else {
            $userRole = 'GUEST';
        }

        if ($userRole == 'ADMIN') {
            return redirect('/cabinet/admin');
        }

        $categories = CategoryResource::collection(Category::all());

        return view('catalog', ['data' => $userData, 'role' => $userRole, 'categories' => $categories]);
    }

    public function product(Request $request, $category)
    {
        $userData = new UserResource(auth()->user(User::with('role')->select('role')));
        if (isset($userData->role)) {
            $userRole = $userData->role->title;
        } else {
            $userRole = 'GUEST';
        }

        if ($userRole == 'ADMIN') {
            return redirect('/cabinet/admin');
        }

        $products = ProductResource::collection(Product::all()->where('category_id', $category));

        $category_title = new CategoryResource(Category::findOrFail($category));

        return view('products', ['data' => $userData, 'role' => $userRole, 'category' => $category_title, 'products' => $products]);
    }

    public function showProduct($id)
    {
        $userData = new UserResource(auth()->user(User::with('role')->select('role')));
        if (isset($userData->role)) {
            $userRole = $userData->role->title;
        } else {
            $userRole = 'GUEST';
        }

        if ($userRole == 'ADMIN') {
            return redirect('/cabinet/admin');
        }

        $product = new ProductResource(Product::findOrFail($id));

        $category = CategoryResource::collection(Category::all()->where('id', $product->category_id));

        return view('product', ['data' => $userData, 'role' => $userRole, 'product' => $product, 'category' => $category,]);
    }
}
