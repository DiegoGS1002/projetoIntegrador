<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Supplier; // IMPORTANTE

class ProductController extends Controller
{
    public function index(Request $request)
    {
       $query = Product::with('supplier');

    //  Pesquisa por nome
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    //  Filtro por fornecedor
    if ($request->filled('supplier_id')) {
        $query->where('supplier_id', $request->supplier_id);
    }

    //  Filtro por unidade de medida
    if ($request->filled('unit_of_measure')) {
        $query->where('unit_of_measure', $request->unit_of_measure);
    }
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }
    if ($request->expiration_date === 'expired') {
        $query->whereDate('expiration_date', '<', now());
    }

    if ($request->expiration_date === 'valid') {
        $query->whereDate('expiration_date', '>=', now());
    }


    if ($request->expiration_date === 'na') {
        $query->whereNull('expiration_date');
    }

    $products = $query->paginate(10);
    $suppliers = Supplier::all();

    return view('produtos.index', compact('products', 'suppliers'));
    }

    public function create(){
        $suppliers = Supplier::all(); // busca fornecedores
            return view('produtos.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255|unique:products,name',
            'ean' => 'required|string|size:13|unique:products,ean',
            'description' => 'required|string|max:255',
            'unit_of_measure' => 'required|string',
            'sale_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'expiration_date' => 'nullable|date',
            'category' => 'required|string',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'ean' => $request->ean,
            'description' => $request->description,
            'unit_of_measure' => $request->unit_of_measure,
            'sale_price' => $request->sale_price,
            'stock' => $request->stock,
            'expiration_date' => $request->expiration_date,
            'category' => $request->category,
        ]);

        return redirect()
            ->route('products.suppliers.index', $product->id)
            ->with('success', 'Produto cadastrado. Agora vincule um fornecedor.');
    }


    public function update(Request $request, Product $product)
        {
            $request->validate([
                'name' => 'required|string|min:3|max:255|unique:products,name,' . $product->id,
                'ean' => 'required|string|size:13|unique:products,ean,' . $product->id,
                'description' => 'required|string|max:255',
                'unit_of_measure' => 'required|string',
                'sale_price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'expiration_date' => 'nullable|date',
                'category' => 'required|string',
            ]);

            $product->update($request->all());

            return redirect()
                ->route('products.index')
                ->with('success', 'Produto atualizado com sucesso!');
        }

     public function destroy(Product $product){
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produto deletado com sucesso!');
    }
}
