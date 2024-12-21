@extends('layout.master')
@extends('layout.menu')

@section('content')

<style>
    .container.book {
        max-width: 800px;
        margin: 40px auto;
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    }

    .container.book h1 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    .book nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    .book nav ul li {
        margin: 0 10px;
    }

    .book nav ul li a {
        padding: 8px 16px;
        text-decoration: none;
        font-size: 16px;
        color: #007bff;
        border: 2px solid #007bff;
        border-radius: 5px;
        transition: 0.3s;
    }

    .book nav ul li a.active, 
    .book nav ul li a:hover {
        background-color: #007bff;
        color: #fff;
    }

    .empty-message {
        text-align: center;
        font-size: 18px;
        color: #555;
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

    .user-card .due_date {
        font-size: 14px;
        font-weight: bold;
        color: #e63946;
    }

    .user-card .actions a {
        padding: 8px 12px;
        text-decoration: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        margin-right: 10px;
        transition: 0.3s;
    }

    .user-card .actions a:hover {
        background-color: #0056b3;
    }
</style>

<div class="container book">
    <h1>Livros</h1>
    
    <nav>
        <ul>
            <li><a class="active" href="/books">Listar</a></li>
            <li><a href="{{ route('books.create') }}">Cadastrar</a></li>    
            <li><a href="./genres">Gênero</a></li>       
        </ul>
    </nav>

    @if ($books->isEmpty())
        <div class="empty-message">
            <p style=" padding: 5rem 0;  text-align: center; font-size: 16px; color: #555;">Nenhum livro cadastrado no momento.</p>
        </div>
    @else
        <ul class="users-list">
            @foreach ($books as $book)
                <x-book-card :Book="$book" />
            @endforeach
        </ul>
    @endif
</div>

@endsection
