@extends('layout.master')
@extends('layout.menu')

@section('content')

<style>
    .container.locacao {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .locacao nav{
        padding: 2rem 0;
    }

    .locacao nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    .locacao nav ul li {
        margin-right: 20px;
    }

    .locacao nav ul li a {
        padding: 0.5rem 1rem;
        text-decoration: none;
        font-size: 16px;
        border: solid 1px #007bff;
        color: #007bff;
        transition: all 0.3s ease;
        border-radius: 5px;
    }

    .locacao nav ul li a.active,
    .locacao nav ul li a:hover {
        background-color: #007bff;
        color: #fff;
    }

    .locacao form {
        display: flex;
        flex-direction: column;
    }

    .locacao form .col-100 {
        margin-bottom: 20px;
    }

    .locacao form label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .locacao form input,
    .locacao form select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .locacao form button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .locacao form button:hover {
        background-color: #0056b3;

    }

    .info {
        background: #cea10f;
        padding: .5rem .3rem;
        color: #fff;
        margin-bottom: 20px;
    }
</style>

<div class="container locacao">
    <h1>Cadastrar Locação</h1>
    
    <nav>
        <ul>
            <li><a href="/loans">Listar</a></li>
            <li><a class="active" href="{{ route('loans.create') }}">Cadastrar</a></li>    
        </ul>
    </nav>
    
    <form action="{{ route('loans.store') }}" method="post">
        @csrf
        
        <div class="col-100">
            <label for="user_id">Cliente:</label>
            <select name="user_id" id="user_id" required>
                <option value="" selected>Selecione</option>
                @foreach ($users as $user )
                    <option value="{{ $user->id }}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-100">
            <label for="book_id">Livro:</label>
            <select name="book_id" id="book_id" required>
                <option value="" selected>Selecione</option>
                @foreach ($books as $book )
                    @if ($book->status == 'disponivel')
                        <option value="{{ $book->id }}">{{$book->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-100">
            <label for="return_date">Devolução:</label>
            <input type="date" name="return_date" placeholder="00/00/0000" required>
        </div>

        <div class="col-100">
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="" selected>Selecione</option>
                <option value="atrasado">Atrasado</option>
                <option value="devolvido">Devolvido</option>
                <option value="pendente">Pendente</option>
            </select>
        </div>

        @if (session()->has('message'))
            <div class="info col-100"> {{ session()->get('message') }} </div>
        @endif

        <button type="submit">Cadastrar</button>
    </form>
</div>

@endsection
