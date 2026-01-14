@extends('layouts.app')

@section('title', 'Pagina Inicial')

@section('content')
    <main class="welcome">
        <div class="welcome-message">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
    </main>
@endsection
