<style>
    .container-products{
        width: 100%;
        margin-top: 70px;
        padding: 20px;
        max-width: 1920px;
    }
    .button-create-products{
        margin-bottom: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }
    .button-create-products button{
        padding: 10px 18px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }
    .button-create-products button a{
        text-decoration: none;
        color: white;
    }

    .table-products{
        width: 100%;
        border-collapse: collapse;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .table-products th,
    .table-products td{
        padding: 12px 10px;
        border: 1px solid #ddd;
    }

    .table-products tr:nth-child(even){
        background-color: #f9f9f9;
    }

    .table-products tbody tr:hover{
        background-color: #f1f1f1;
    }

    .table-products thead {
        background-color: #f2f2f2;
    }

    .table-products th {
        font-weight: bold;
    }

    .download svg{
        vertical-align: middle;
        margin-right: 5px;
    }

</style>
@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<main class="container-products">
    <div class="button-create-products">
        <button><a href="{{ route('products.create') }}">Adicionar Produto</a></button>
        <button class="download">
        <a href="{{ route('products.create') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
            viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
            <polyline points="7 10 12 15 17 10"/>
            <line x1="12" y1="15" x2="12" y2="3"/>
        </svg>
        Baixar Lista</a></button>
    </div>
    <table class="table-products">
        <thead>
            <tr class="">
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Fornecedor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->nome }}</td>
                    <td>{{ $product->descricao }}</td>
                    <td>{{ $product->preco }}</td>
                    <td>{{ $product->estoque }}</td>
                    <td>{{ $product->fornecedor }}</td>
                    <td>
                        <a href="#">Editar</a>
                        <a href="#">Excluir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
