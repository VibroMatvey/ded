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
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CatalogController extends Controller
{
    public function index (Product $model)
    {
        $userData = new UserResource(auth()->user(User::with('role')->select('role')));
        if (isset($userData->role)) {
            $userRole = $userData->role->title;
        } else {
            $userRole = 'GUEST';
        }

        $categories = CategoryResource::collection(Category::all());

        return view('catalog', ['data' => $userData, 'role' => $userRole, 'categories' => $categories]);
    }

    public function product ($category) {
        $userData = new UserResource(auth()->user(User::with('role')->select('role')));
        if (isset($userData->role)) {
            $userRole = $userData->role->title;
        } else {
            $userRole = 'GUEST';
        }

        $products = ProductResource::collection(Product::all()->where('category_id', $category));

        $category_title = new CategoryResource(Category::findOrFail($category));

        return view('products', ['data' => $userData, 'role' => $userRole, 'category' => $category_title, 'products' => $products]);
    }
}
