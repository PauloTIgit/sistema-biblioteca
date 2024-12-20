@extends('layout.master')
@extends('layout.menu')

@section('content')

<style>
    .container.usuario {
        max-width: 900px;
        margin: 30px auto;
        background: #ffffff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    .container.usuario h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .usuario nav ul {
        list-style: none;
        padding: 0;
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .usuario nav ul li a {
        padding: 10px 20px;
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        border-radius: 5px;
        color: #444;
        border: 1px solid #ddd;
        transition: all 0.3s ease;
    }

    .usuario nav ul li a.active, 
    .usuario nav ul li a:hover {
        background-color: #0066cc;
        color: white;
        border-color: #0066cc;
    }

    .users-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .user-card {
        background: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 15px 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .user-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
    }

    .user-card h2 {
        font-size: 20px;
        color: #333;
        margin-bottom: 10px;
    }

    .user-card p {
        color: #555;
        margin-bottom: 15px;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .actions a {
        text-decoration: none;
        color: white;
        padding: 8px 15px;
        border-radius: 5px;
        font-size: 14px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .btn-secondary {
        background-color: #007bff;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #0056b3;
    }
</style>

<div class="container usuario">
    <h1>Clientes</h1>

    <nav>
        <ul>
            <li><a class="active" href="/users">Listar</a></li>
            <li><a href="{{ route('users.create') }}">Cadastrar</a></li>    
        </ul>
    </nav>
    
    @if ($users->isEmpty())
        <p class="text-center" style="font-size: 16px; color: #555;">Nenhum cliente cadastrado.</p>
    @else
        <ul class="users-list">
            @foreach ($users as $user)
                <x-user-card :User="$user" />
            @endforeach
        </ul>
    @endif
</div>

@endsection
