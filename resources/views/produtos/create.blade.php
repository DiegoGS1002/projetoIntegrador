@extends('layouts.app')

@if ($errors->any())
    <div class="alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
    .alert-error{
        background: #fdecea;
        color: #b71c1c;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 15px;
    }

    form {
        display: flex;
        flex-direction: column;
        width: 300px;
        margin: 0 auto;
        margin-top: 90px;
    }

    input, select {
        margin-bottom: 10px;
        padding: 8px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        padding: 10px 18px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
</style>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Nome"
           value="{{ old('name') }}" required>

    <select name="supplier_id" required>
        <option value="">Selecione um fornecedor</option>
        @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}"
                {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                {{ $supplier->name }}
            </option>
        @endforeach
    </select>
    @error('supplier_id')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <input type="text" name="sku" placeholder="SKU"
           value="{{ old('sku') }}">

    <input type="text" name="description" placeholder="Descrição"
           value="{{ old('description') }}">

    <select name="unit_of_measure" required>
        <option value="">Selecione a unidade</option>
        <option value="UN" {{ old('unit_of_measure') == 'unidade' ? 'selected' : '' }}>Unidade</option>
        <option value="KG" {{ old('unit_of_measure') == 'kg' ? 'selected' : '' }}>Kg</option>
        <option value="Litro" {{ old('unit_of_measure') == 'litro' ? 'selected' : '' }}>Litro</option>
        <option value="Metro" {{ old('unit_of_measure') == 'metro' ? 'selected' : '' }}>Metro</option>
    </select>

    <input type="number" step="0.01" name="sale_price"
           placeholder="Preço de Venda" value="{{ old('sale_price') }}">

    <input type="number" name="stock" placeholder="Estoque"
           value="{{ old('stock') }}" required>

    <button type="submit">Salvar</button>
</form>
