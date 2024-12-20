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
        border: solid 1px #333;
        color: #000;
        transition: all 0.3s ease;
        border-radius: 5px;
    }

    .book nav ul li a.active, 
    .book nav ul li a:hover {
        background-color: #333;
        color: #fff;
    }

    .book .col-100 {
        margin-bottom: 20px;
    }

    .book .content{
        padding: 2rem 0;
    }
   
    .book .button {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #007bff;  /* Azul */
        color: #fff;
        border: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        text-decoration: none;
    }
    .book .button:hover {
        background-color: #0056b3;  /* Azul mais escuro no hover */
    }

    .book .actions {
        display: flex;
        justify-content: space-between;
    }
    .book .actions form,
    .book .actions button{
        margin: 0;
        height: 100%;
    }

    .info {
        background: #cea10f;
        padding: .5rem .3rem;
        color: #fff;
    }
</style>

<div class="container book">
    <h1>Visualizar Livro</h1>
    <div class="content">
        <div class="col-100">
            <p><strong>Nome:</strong> {{ $book->name }}</p>
        </div>
        <div class="col-100">
            <p><strong>Autor:</strong> {{ $book->author }}</p>
        </div>
        <div class="col-100">
            @foreach ($genres as $genre )
                @if ($genre->id == $book->genre_id)
                    <p><strong>Gênero:</strong> {{ $genre->name }}</p>
                @endif
            @endforeach
        </div>
        <div class="col-100">
            <p><strong>Status:</strong> {{ $book->status }}</p>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="info col-100"> {{ session()->get('message') }} </div>
    @endif

    <div class="actions">
        <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST" style="display:inline; height: 3rem;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger " type="submit" aria-label="Excluir {{ $book->name }}">Excluir</button>
        </form>
    
        <a class="btn button" href="/books">Voltar</a> 
    </div>

</div>

@endsection
