<header class="container">
    <nav class="menu">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>
        </div>

        <ul>
            <li><a href="{{ url('/') }}">Início</a></li>
            <li><a href="{{ url('/product') }}">Produtos</a></li>
            <li><a href="{{ url('/supplier') }}">Fornecedores</a></li>
            <li><a href="{{ url('/client') }}">Clientes</a></li>
        </ul>
    </nav>
</header>
