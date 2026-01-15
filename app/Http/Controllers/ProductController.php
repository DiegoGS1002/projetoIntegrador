<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Supplier; // IMPORTANTE

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // ou paginate(10)

        return view('produtos.index', compact('products'));
    }

    public function create(){
        $suppliers = Supplier::all(); // busca fornecedores
            return view('produtos.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier'=> 'required|exists:suppliers,id', // <-- Validação para fornecedor
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:255|unique:products,sku',
            'description' => 'nullable|string',
            'unit_of_measure' => 'required|string',
            'sale_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'sku' => $request->sku,
            'description' => $request->description,
            'unit_of_measure' => $request->unit_of_measure,
            'sale_price' => $request->sale_price,
            'stock' => $request->stock,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produto salvo com sucesso!');
    }

     public function update(Request $request, Product $product){
        $request->validate([
            'supplier'=> 'required|exists:suppliers,id', // <-- Validação para fornecedor
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:255|unique:products,sku',
            'description' => 'nullable|string',
            'unit_of_measure' => 'required|string',
            'sale_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create([
            'supplier_id' => $request->supplier_id,
            'name' => $request->name,
            'sku' => $request->sku,
            'description' => $request->description,
            'unit_of_measure' => $request->unit_of_measure,
            'sale_price' => $request->sale_price,
            'stock' => $request->stock,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produto salvo com sucesso!');
    }

     public function destroy(Product $product){
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produto deletado com sucesso!');
    }
}
