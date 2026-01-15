@extends('layouts.app')
@section('title', 'Adicionar Fornecedor')

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
</style>
@section('content')

    @if ($errors->any())
        <div style="background:#f8d7da; color:#721c24; padding:10px; margin-bottom:15px;">
            <ul style="margin:0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('suppliers.store')}}" method="POST">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nome" required>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
        <input type="text" name="phone_number" value="{{ old('phone_number') }}" placeholder="Telefone" required>
        <input type="text" name="address_zip_code" value="{{ old('address_zip_code') }}" placeholder="CEP" required>
        <input type="text" name="address_street" value="{{ old('address_street') }}" placeholder="Rua" required>
        <input type="text" name="address_number" value="{{ old('address_number') }}" placeholder="Número" required>
        <input type="text" name="address_complement" value="{{ old('address_complement') }}" placeholder="Complemento">
        <input type="text" name="address_district" value="{{ old('address_district') }}" placeholder="Bairro" required>
        <input type="text" name="address_city" value="{{ old('address_city') }}" placeholder="Cidade" required>
        <input type="text" name="address_state" value="{{ old('address_state') }}" placeholder="Estado (UF)" required>
        <input type="text" name="social_name" value="{{ old('social_name') }}" placeholder="Razão Social">
        <input type="text" name="taxNumber" value="{{ old('taxNumber') }}" placeholder="CNPJ" required>
        @error('taxNumber')
            <div style="color: red; font-size: 14px; margin-top: 5px;">
                {{ $message }}
            </div>
        @enderror

        <button type="submit">Salvar</button>
    </form>
@endsection
