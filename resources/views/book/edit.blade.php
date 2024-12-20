@extends('layout.master')
@extends('layout.menu')

@section('content')

<style>
    .container.book {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .book nav {
        padding: 10px 0;
        margin-bottom: 20px;
    }

    .book nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    .book nav ul li {
        margin-right: 20px;
    }

    .book nav ul li a {
        padding: 0.5rem 1rem;
        text-decoration: none;
        font-size: 16px;
        border: solid 1px #007bff;  /* Bordas em azul */
        color: #007bff;  /* Texto azul */
        transition: all 0.3s ease;
        border-radius: 5px;
    }

    .book nav ul li a:hover, 
    .book nav ul li a.active {
        background-color: #007bff;  /* Cor de fundo azul */
        color: #fff;  /* Texto branco no hover */
    }

    .book form {
        display: flex;
        flex-direction: column;
    }
    .book form .col-100 {
        margin-bottom: 20px;
    }
    .book form label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }
    .book form input,
    .book form select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }
    .book form button {
        background-color: #007bff;  /* Azul */
        color: #fff;
        border: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 20px;
    }
    .book form button:hover {
        background-color: #0056b3;  /* Azul mais escuro no hover */
    }

    .info {
        background: #cea10f;
        padding: .5rem .3rem;
        color: #fff;
    }
</style>

<div class="container book">
    <h1>Editar Cliente</h1>
    
    <nav>
        <ul>
            <li><a href="/books">Listar</a></li>
            <li><a href="{{ route('books.create') }}">Cadastrar</a></li>    
        </ul>
    </nav>
    
    <form action="{{ route('books.update', ['book' => $book->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        
        <div class="col-100">
            <label for="name">Nome:</label>
            <input type="text" name="name" placeholder="Nome" value="{{$book->name}}" required>
        </div>
        <div class="col-100">
            <label for="author">Autor(a):</label>
            <input type="text" name="author" placeholder="Autor" value="{{$book->author}}" required>
        </div>
        <div class="col-100">
            <label for="genero">Gênero:</label>
            <select name="genero" id="genero">
                @foreach ($genres as $genre )
                    @if ($genre->id == $book->genre_id)
                        <option value="{{ $genre->name }}" selected>{{$genre->name}}</option>
                    @else
                        <option value="{{ $genre->name }}">{{$genre->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="col-100">
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="{{ $book->status }}" selected>{{ $book->status }}</option>
                <option value="disponivel">Disponível</option>
                <option value="emprestado">Emprestado</option>
            </select>
        </div>

        @if (session()->has('message'))
            <div class="info col-100"> {{ session()->get('message') }} </div>
        @endif

        <button type="submit">Editar</button>
    </form>
</div>

@endsection
