@extends('layout.master')
@extends('layout.menu')

@section('content')

<div class="container genero">
    <h1>Gêneros</h1>
    
    <nav>
        <ul class="nav-links">
            <li><a class="active" href="/genres">Listar</a></li>
            <li><a href="{{ route('genres.create') }}">Cadastrar</a></li>
            <li><a href="/books">Livros</a></li>
        </ul>
    </nav>
    
    @if ($genres->isEmpty())
        <div class="empty-message">
            <p style=" padding: 5rem 0;  text-align: center; font-size: 16px; color: #555;">Nenhum gênero cadastrado no momento.</p>
            <a href="{{ route('genres.create') }}" class="btn-primary">Cadastrar Gênero</a>
        </div>
    @else
        <ul class="users-list">
            @foreach ($genres as $genre)
                <x-genre-card :Genre="$genre" />
            @endforeach
        </ul>
    @endif
</div>

<style>
    .container.genero {
        max-width: 800px;
        margin: 40px auto;
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    }

    .container.genero h1 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    .nav-links {
        display: flex;
        justify-content: center;
        gap: 10px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-links a {
        padding: 8px 16px;
        font-size: 16px;
        color: #007bff;
        border: 2px solid #007bff;
        border-radius: 5px;
        transition: 0.3s;
        text-decoration: none;
    }

    .nav-links a:hover, .nav-links a.active {
        background-color: #007bff;
        color: #fff;
    }

    .empty-message {
        text-align: center;
        font-size: 18px;
        color: #555;
        margin: 20px 0;
    }

    .empty-message p {
        margin-bottom: 10px;
    }

    .btn-primary {
        display: inline-block;
        padding: 8px 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .users-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-top: 20px;
        padding: 0;
        list-style: none;
    }

    .user-card {
        background: #ffffff;
        border: 1px solid #eaeaea;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .user-card:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .user-card h2 {
        font-size: 22px;
        color: #333;
        margin-bottom: 10px;
    }

    .user-card .actions {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
    }

    .user-card button {
        font-size: 14px;
        padding: 8px 12px;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        border: none;
        transition: 0.3s;
    }

    .user-card button:hover {
        background-color: #0056b3;
    }

    .user-card a {
        font-size: 14px;
        color: #fff;
        transition: color 0.3s;
    }
    
    .user-card a:hover {
        background: #007bff;
        color: #fff;
    }
</style>

@endsection
