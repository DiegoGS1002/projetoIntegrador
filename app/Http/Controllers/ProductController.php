<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // ou paginate(10)

        return view('produtos.index', compact('products'));
    }

    public function create(){
        return view('produtos.create');
    }

}
