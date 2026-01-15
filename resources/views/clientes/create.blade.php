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

<form action="{{route('clients.store')}}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone_number" placeholder="Telefone" required>
    <input type="text" name="address" placeholder="Endereço" required>
    <input type="text" name="social_name" placeholder="Razão Social">
    <input type="text" name="taxNumber" placeholder="CNPJ" required>

    <button type="submit">Salvar</button>
</form>
