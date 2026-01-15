<style>
    .container-supplier{
        width: 100%;
        margin-top: 70px;
        padding: 20px;
        max-width: 1920px;
    }
    .button-create-supplier{
        margin-bottom: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }
    .button-create-supplier button{
        padding: 10px 18px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }
    .button-create-supplier button a{
        text-decoration: none;
        color: white;
    }

    .table-supplier{
        width: 100%;
        border-collapse: collapse;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .table-supplier th,
    .table-supplier td{
        padding: 12px 10px;
        border: 1px solid #ddd;
    }

    .table-supplier tr:nth-child(even){
        background-color: #f9f9f9;
    }

    .table-supplier tbody tr:hover{
        background-color: #f1f1f1;
    }

    .table-supplier thead {
        background-color: #f2f2f2;
    }

    .table-supplier th {
        font-weight: bold;
    }

     .download svg{
        vertical-align: middle;
        margin-right: 5px;
    }

</style>

@extends('layouts.app')

@section('title', 'Fornecedores')

 @section('content')
        <main class="container-supplier">
            <div class="button-create-supplier">
                <button>
                    <a href="{{ route('suppliers.create') }}">
                        Adicionar Fornecedor
                    </a>
                </button>
                <button class="download">
                    <a href="{{ route('suppliers.print') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="7 10 12 15 17 10"/>
                            <line x1="12" y1="15" x2="12" y2="3"/>
                        </svg>
                        Baixar Lista
                    </a>
            </button>
            </div>
            <table class="table-supplier">
                <thead>
                    <tr class="table-header">
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>CNPJ</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach($suppliers as $supplier)
                    <tr>
                            <td>{{ $supplier->nome }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->telefone }}</td>
                            <td>{{ $supplier->endereco }}</td>
                            <td>{{ $supplier->cnpj }}</td>
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
