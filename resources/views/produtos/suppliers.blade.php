@extends('layouts.app')

@section('content')

<div class="container">

    {{-- Mensagens --}}
    @if ($errors->any())
        <div class="alert-error">
            {{ $errors->first() }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Associação de Fornecedor a Produto</h2>

    <a href="{{ route('products.index') }}">← Voltar</a>

    {{-- 🔹 Detalhes do Produto --}}
    <h3>Detalhes do Produto</h3>

    <input type="text" value="{{ $product->name }}" readonly>
    <input type="text" value="{{ $product->ean }}" readonly>
    <textarea readonly>{{ $product->description }}</textarea>

    {{-- 🔹 Associação --}}
    <h3>Associar Fornecedor</h3>

    @if ($associatedSuppliers->isEmpty())
        <form method="POST" action="{{ route('products.suppliers.store', $product->id) }}">
            @csrf

            <select name="supplier_id" required>
                <option value="">Selecione um fornecedor</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">
                        {{ $supplier->social_name }} - {{ $supplier->taxNumber }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Associar Fornecedor</button>
        </form>
    @else
        <p style="color:#555;">
            Este produto já possui um fornecedor associado.
        </p>
    @endif

    {{-- 🔹 Fornecedor Associado --}}
    <h3>Fornecedor Associado</h3>

    @if ($associatedSuppliers->isEmpty())
        <p>Nenhum fornecedor associado.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Fornecedor</th>
                    <th>CNPJ</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($associatedSuppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->social_name }}</td>
                        <td>{{ $supplier->taxNumber }}</td>
                        <td>
                            <form
                                method="POST"
                                action="{{ route('products.suppliers.destroy', [$product->id, $supplier->id]) }}"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">Desassociar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>

@endsection
