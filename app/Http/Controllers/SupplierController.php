<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all(); // ou paginate(10)

        return view('fornecedores.index', compact('suppliers'));
    }

    public function create(){
        return view('fornecedores.create');
    }

    public function store(Request $request){
        $supplier = new Supplier();
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->phone = $request->input('phone');
        $supplier->address = $request->input('address');
        $supplier->save();

        return redirect()->route('suppliers.index');
    }

}
