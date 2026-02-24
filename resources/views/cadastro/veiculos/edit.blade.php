@extends('layouts.app')

    <link rel="stylesheet" href="{{ app()->environment() === 'production' ? secure_asset('css/forms.css') : asset('css/forms.css') }}">

@if ($errors->any())
    <div class="alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('vehicles.update')}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="model" placeholder="Modelo" required>
    <input type="text" name="brand" placeholder="Marca" required>
    <input type="text" name="year" placeholder="Ano" required>
    <input type="text" name="plate" placeholder="Placa" required>
    <input type="text" name="color" placeholder="Cor" required>
    <input type="text" name="driver" placeholder="Motorista" required>

    <button type="submit">Salvar</button>
    <a class="btn-back" href="{{ route('vehicles.index') }}"> Voltar </a>

</form>
