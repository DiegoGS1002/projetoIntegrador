@extends('layouts.app')
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

@section('content')
@section('title', 'Adicionar Produto')
    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Adicionar Produto</h1>

    <form action="{{ route('products.store') }}" method="POST" class="supplier-form" id="productForm">
        @csrf

        {{-- Informações básicas --}}
        <div class="form-section">
            <h3>Informações Básicas</h3>
            <div class="grid grid-2">
                <div>
                    <label>Nome do Produto:</label>
                    <input type="text" name="name" placeholder="Insira o nome do produto"
                    value="{{ old('name') }}" required>
                </div>

                <div>
                    <label>Código de Barras (GTIN/EAN):</label>
                    <input type="text" name="ean" placeholder="Insira o código de barras"
                    value="{{ old('ean') }}">
                </div>
            </div>
        </div>

        {{-- Descrição --}}
        <div class="form-section">
            <h3>Descrição</h3>
            <div>
                <label>Descrição:</label>
                <input type="text" name="description" placeholder="Descreva brevemente o produto"
                value="{{ old('description') }}">
            </div>
        </div>

        {{-- Seleção --}}
        <div class="form-section">
            <h3>Seleção</h3>
            <div class="grid grid-3">
                <div>
                    <label>Unidade de Medida:</label>
                    <select name="unit_of_measure" required>
                        <option value="">Selecione a unidade</option>
                        <option value="unidade" {{ old('unit_of_measure') == 'unidade' ? 'selected' : '' }}>Unidade</option>
                        <option value="kg" {{ old('unit_of_measure') == 'kg' ? 'selected' : '' }}>Kg</option>
                        <option value="litro" {{ old('unit_of_measure') == 'litro' ? 'selected' : '' }}>Litro</option>
                        <option value="metro" {{ old('unit_of_measure') == 'metro' ? 'selected' : '' }}>Metro</option>
                    </select>
                </div>
                <div>
                    <label>Categoria:</label>
                    <select name="category" class="filter">
                        <option value="">Todas as categorias</option>
                        <option value="eletronico" {{ request('category') == 'eletronico' ? 'selected' : '' }}>Eletrônico</option>
                        <option value="alimentos" {{ request('category') == 'alimentos' ? 'selected' : '' }}>Alimentos</option>
                        <option value="vestuario" {{ request('category') == 'vestuario' ? 'selected' : '' }}>Vestuário</option>
                        <option value="outro" {{ request('category') == 'outro' ? 'selected' : '' }}>Outro</option>
                    </select>
                </div>
            </div>
        </div>

    {{-- Outros --}}
        <div class="form-section">
            <h3>Outros</h3>
            <div class="grid grid-3">
                <div>
                    <label>Preço de Venda:</label>
                    <input type="number" step="0.01" name="sale_price"
                    placeholder="Preço de Venda" value="{{ old('sale_price') }}">
                </div>
                <div>
                    <label>Estoque</label>
                    <input type="number" name="stock" placeholder="Quantidade disponíve"
                    value="{{ old('stock') }}" required>
                </div>
                <div>
                    <label>Data de Validade:</label>
                    <input type="date" name="expiration_date" placeholder="Data de Validade"
                    value="{{ old('expiration_date') }}">
                    <small style="color:#666;">
                        Deixe em branco para produtos sem validade
                    </small>
                </div>
            </div>
        </div>
        <a
            href="#"
            id="linkSupplier"
            class="btn-save"
            style="display:none; text-align:center;"
        >
            Vincular fornecedor (disponível após salvar)
        </a>

        <button type="submit" class="btn-save">Salvar Produto</button>
        <a href="{{ route('products.index') }}" class="btn-back">
            Voltar
        </a>
    </form>
    <script>
        const form = document.getElementById('productForm');
        const linkSupplier = document.getElementById('linkSupplier');

        const requiredFields = form.querySelectorAll(
            'input[required], select[required]'
        );

        function checkForm() {
            let valid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    valid = false;
                }
            });

            linkSupplier.style.display = valid ? 'inline-block' : 'none';
        }

        requiredFields.forEach(field => {
            field.addEventListener('input', checkForm);
            field.addEventListener('change', checkForm);
        });
    </script>'

@endsection
