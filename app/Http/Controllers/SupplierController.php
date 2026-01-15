<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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

  public function store(Request $request)
{
    $validated = $request->validate(
        [
            'name' => 'required|string|max:255',
            'social_name' => 'nullable|string|max:255',
            'taxNumber' => 'required|unique:suppliers,taxNumber',
            'email' => 'required|email|unique:suppliers,email',
            'phone_number' => 'required',
            'address_zip_code' => 'required',
            'address_street' => 'required',
            'address_number' => 'required',
            'address_complement' => 'nullable',
            'address_district' => 'required',
            'address_city' => 'required',
            'address_state' => 'required',
        ],
        [
            'taxNumber.unique' => 'Este CNPJ já está cadastrado.',
            'taxNumber.required' => 'O CNPJ é obrigatório.',
        ]
    );

    Supplier::create($validated + [
        'id' => Str::uuid(),
    ]);

    return redirect()
        ->route('suppliers')
        ->with('success', 'Fornecedor cadastrado com sucesso!');
}

    public function update(Request $request, Supplier $supplier){
        $request->validate([
            'name' => 'required|string|max:255',
            'social_name' => 'nullable|string|max:255',
            'taxNumber' => 'required|unique:suppliers,taxNumber',
            'email' => 'required|email|unique:suppliers,email',
            'phone_number' => 'required',
            'address_zip_code' => 'required',
            'address_street' => 'required',
            'address_number' => 'required',
            'address_complement' => 'nullable',
            'address_district' => 'required',
            'address_city' => 'required',
            'address_state' => 'required',
        ]);

        Supplier::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'social_name' => $request->social_name,
            'taxNumber' => $request->taxNumber,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address_zip_code' => $request->address_zip_code,
            'address_street' => $request->address_street,
            'address_number' => $request->address_number,
            'address_complement' => $request->address_complement,
            'address_district' => $request->address_district,
            'address_city' => $request->address_city,
            'address_state' => $request->address_state,
        ]);

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy(Supplier $supplier){
        $supplier->delete();

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Fornecedor deletado com sucesso!');
    }

}
