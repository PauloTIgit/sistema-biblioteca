@extends('layout.master')
@extends('layout.menu')

@section('content')

<style>
    .container.genero {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .genero nav {
        padding: 10px 0;
    }

    .genero nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    .genero nav ul li {
        margin-right: 20px;
    }

    .genero nav ul li a {
        padding: 0.5rem 1rem;
        text-decoration: none;
        font-size: 16px;
        border: solid 1px #333;
        color: #000;
        transition: all 0.3s ease;
        border-radius: 5px;
    }

    .genero nav ul li a.active, 
    .genero nav ul li a:hover {
        background-color: #007bff;
        border: 1px solid #007bff;

        color: #fff;
    }

    .genero form {
        display: flex;
        flex-direction: column;
    }
    .genero form .col-100 {
        margin-bottom: 20px;
    }
    .genero form label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }
    .genero form input,
    .genero form select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }
    .genero form button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .genero form button:hover {
        border: 1px solid #007bff;
        background-color: #0056b3;
    }

    .info {
        background: #cea10f;
        padding: .5rem .3rem;
        color: #fff;
    }
</style>

<div class="container genero">
    <h1>Cadastrar Gênero</h1>
    
    <nav>
        <ul>
            <li><a href="/genres">Listar</a></li>
            <li><a class="active" href="{{ route('books.create') }}">Cadastrar</a></li>    
            <li><a class="" href="/books">Livros</a></li>
        </ul>
    </nav>
    
    <form action="{{ route('genres.store') }}" method="post">
        @csrf
        <div class="col-100">
            <label for="name">Nome:</label>
            <input type="text" name="name" placeholder="Nome" required>
        </div>

        @if (session()->has('message'))
            <div class="info col-100"> {{ session()->get('message') }} </div>
        @endif

        <button type="submit">Cadastrar</button>
    </form>
</div>

@endsection