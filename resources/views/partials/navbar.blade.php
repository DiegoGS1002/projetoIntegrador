<header class="container">
    <nav class="menu">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ app()->environment() === 'production' ? secure_asset('images/logo.png') : asset('images/logo.png') }}" alt="Logo">
            </a>
        </div>

        <ul>
            <li><a href="{{ route('home') }}">Início</a></li>
            <li><a href="{{ route('products.index') }}">Produtos</a></li>
            <li><a href="{{ route('suppliers.index') }}">Fornecedores</a></li>
            <li><a href="{{ route('clients.index') }}">Clientes</a></li>
        </ul>
    </nav>
</header>
