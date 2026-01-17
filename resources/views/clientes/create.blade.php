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

        .grid-3 {
            grid-template-columns: 1fr 1fr 1fr;
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

        select{
            margin-bottom: 10px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

    </style>

<form action="{{route('clients.store')}}" method="POST" class="supplier-form">
    @csrf
    <div class="form-section">
        <h1>Cadastrar cliente</h1>
        <div class="grid grid-2">
            <div>
                <label>Nome</label>
                <input type="text" name="name" placeholder="Digite o nome do cliente" required>
            </div>
            <div>
                <label>CNPJ</label>
                <input type="text" name="taxNumber" placeholder="00.000.000/0000-00" required>
            </div>
        </div>
        <div class="grid grid-2">
            <div>
                <label>E-mail</label>
                <input type="email" name="email" placeholder="email@exemplo.com" required>
            </div>
            <div>
                <label>Telefone</label>
                <input type="text" name="phone_number" placeholder="(00) 00000-0000)" required>
            </div>
        </div>
        <div class="grid grid-1">
            <label>Endereço</label>
            <input type="text" name="address" placeholder="Digite o endereço completo do cliente" required>
        </div>
        <div class="grid grid-1">
            <label>Razão social</label>
            <input type="text" name="social_name" placeholder="Razão Social">
        </div>
    </div>

    <button type="submit" class="btn-save">Salvar Produto</button>
    <a class="btn-back" href="{{ route('clients.index') }}"> Voltar </a>
</form>
