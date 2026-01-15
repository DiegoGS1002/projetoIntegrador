<style>
    .container-client{
        width: 100%;
        margin-top: 70px;
        padding: 20px;
        max-width: 1920px;
    }
    .button-create-client{
        margin-bottom: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }
    .button-create-client button{
        padding: 10px 18px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }
    .button-create-client button a{
        text-decoration: none;
        color: white;
    }

    .table-clients{
        width: 100%;
        border-collapse: collapse;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .table-clients th,
    .table-clients td{
        padding: 12px 10px;
        border: 1px solid #ddd;
    }

    .table-clients tr:nth-child(even){
        background-color: #f9f9f9;
    }

    .table-clients tbody tr:hover{
        background-color: #f1f1f1;
    }

    .table-clients thead {
        background-color: #f2f2f2;
    }

    .table-clients th {
        font-weight: bold;
    }

     .download svg{
        vertical-align: middle;
        margin-right: 5px;
    }

    .delete button{
        background: none;
        border: none;
        color: red;
        cursor: pointer;
        font-size: 1em;
        text-decoration: underline;
        padding: 0;
        font-family: inherit;
    }

    .edit button{
        background: none;
        border: none;
        color: blue;
        cursor: pointer;
        font-size: 1em;
        text-decoration: underline;
        padding: 0;
        font-family: inherit;
    }

    </style>

    @extends('layouts.app')

    @section('title', 'Clientes')

    @section('content')
        <main class="container-client">
            <div class="button-create-client">
                <button>
                    <a href="{{ route('clients.create') }}">
                        Adicionar Cliente
                    </a>
                </button>
                <button class="download">
                    <a href="{{ route('clients.create') }}">
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
            <table class="table-clients">
                <thead>
                    <tr class="table-header">
                        <th>Nome</th>
                        <th>Razão Social</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>CNPJ</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach($clients as $client)
                    <tr>
                            <<td>{{ $client->name }}</td>
                            <td>{{ $client->social_name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone_number }}</td>
                            <td>{{ $client->address }}</td>
                            <td>{{ $client->taxNumber }}</td>
                            <td>
                                <a href="{{ route('clients.edit', $client) }}" class="edit">Editar</a>

                                <form class="delete" action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Deseja excluir este cliente?')">
                                        Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </main>
    @endsection
