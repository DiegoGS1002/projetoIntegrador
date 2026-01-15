@extends('layouts.app')

<form action="{{route('clients.update')}}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone_number" placeholder="Telefone" required>
    <input type="text" name="address" placeholder="Endereço" required>
    <input type="text" name="social_name" placeholder="Razão Social">
    <input type="text" name="taxNumber" placeholder="CNPJ" required>

    <button type="submit">Salvar</button>
</form>
