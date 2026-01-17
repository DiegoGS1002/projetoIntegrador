@extends('layouts.app')
@section('title', 'Editar Fornecedor')

@section('content')
<style>
    .alert-error{
        background: #fdecea;
        color: #b71c1c;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 15px;
        margin-top: 70px;
    }

    form {
        width: 90%;
        margin: 0 auto;
        margin-top: 50px;
    }

    input {
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

    h1 {
        text-align: center;
        margin-bottom: 20px;
        margin-top: 80px;
    }

    .supplier-form {
        max-width: 1000px;
        margin: 80px auto;
        font-family: Arial, Helvetica, sans-serif;
    }

    .form-section {
        margin-bottom: 30px;
    }

    .form-section h3 {
        margin-bottom: 12px;
        padding-bottom: 5px;
        border-bottom: 2px solid #ddd;
        font-size: 18px;
        color: #333;
    }

    .grid {
        display: grid;
        gap: 12px;
    }

    .grid-1 {
        grid-template-columns: 1fr;
    }

    .grid-2 {
        grid-template-columns: 1fr 1fr;
    }

    .grid-5 {
        grid-template-columns: 2fr 1fr 1.5fr 1.5fr 0.7fr;
    }

    label {
        display: block;
        font-size: 13px;
        margin-bottom: 4px;
        color: #555;
    }

    input {
        width: 100%;
        padding: 8px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input:focus {
        outline: none;
        border-color: #4CAF50;
    }

    .btn-save {
        padding: 12px 22px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }
    .btn-back {
        padding: 12px 22px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-save:hover {
        background-color: #45a049;
    }
</style>
@if ($errors->any())
    <div style="background:#f8d7da; color:#721c24; padding:10px; margin-bottom:15px;">
        <ul style="margin:0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1><strong>Editar Fornecedor</strong></h1>

<form action="{{ route('suppliers.update', $supplier) }}" method="POST" class="supplier-form">
    @csrf
    @method('PUT')

    {{-- INFORMAÇÕES --}}
    <div class="form-section">
        <h3>Informações</h3>

        <div class="grid grid-2">
            <div>
                <label>Razão Social</label>
                <input type="text"
                       name="social_name"
                       value="{{ old('social_name', $supplier->social_name) }}"
                       required>
            </div>

            <div>
                <label>CNPJ</label>
                <input type="text"
                       name="taxNumber"
                       value="{{ old('taxNumber', $supplier->taxNumber) }}"
                       required>
            </div>
        </div>
    </div>

    {{-- ENDEREÇO --}}
    <div class="form-section">
        <h3>Endereço</h3>

        <div class="grid grid-5">
            <input type="text" name="address_street"
                   value="{{ old('address_street', $supplier->address_street) }}"
                   placeholder="Rua">

            <input type="text" name="address_number"
                   value="{{ old('address_number', $supplier->address_number) }}"
                   placeholder="Número">

            <input type="text" name="address_district"
                   value="{{ old('address_district', $supplier->address_district) }}"
                   placeholder="Bairro">

            <input type="text" name="address_city"
                   value="{{ old('address_city', $supplier->address_city) }}"
                   placeholder="Cidade">

            <input type="text" name="address_state"
                   value="{{ old('address_state', $supplier->address_state) }}"
                   maxlength="2"
                   placeholder="UF">

            <input type="text" name="address_complement"
                   value="{{ old('address_complement', $supplier->address_complement) }}"
                   placeholder="Complemento">

            <input type="text" name="address_zip_code"
                   value="{{ old('address_zip_code', $supplier->address_zip_code) }}"
                   placeholder="00000-000">
        </div>
    </div>

    {{-- CONTATOS --}}
    <div class="form-section">
        <h3>Contatos</h3>

        <div class="grid grid-2">
            <input type="text" name="phone_number"
                   value="{{ old('phone_number', $supplier->phone_number) }}"
                   placeholder="Telefone">

            <input type="email" name="email"
                   value="{{ old('email', $supplier->email) }}"
                   placeholder="Email">
        </div>
    </div>

    <button type="submit" class="btn-save">
        Atualizar Fornecedor
    </button>
    <a class="btn-back" href="{{ route('suppliers.index') }}"> Voltar </a>

</form>

@endsection
