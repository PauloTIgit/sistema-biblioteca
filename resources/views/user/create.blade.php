@extends('layout.master')
@extends('layout.menu')

@section('content')

<style>
    .container.usuario {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
    }

    .usuario nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    .usuario nav ul li {
        margin-right: 20px;
    }

    .usuario nav ul li a {
        padding: 0.5rem 1rem;
        text-decoration: none;
        font-size: 16px;
        border: solid 1px #007bff;
        color: #007bff;
        transition: all 0.3s ease;
        border-radius: 5px;
    }

    .usuario nav ul li a.active,
    .usuario nav ul li a:hover {
        background-color: #007bff;
        color: #fff;
    }

    .usuario form {
        display: flex;
        flex-direction: column;
    }
    
    .usuario form .col-100 {
        margin-bottom: 20px;
    }
    
    .usuario form label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .usuario form input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .usuario form button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .usuario form button:hover {
        background-color: #0056b3;
    }

    .info {
        background: #cea10f;
        padding: .5rem .3rem;
        color: #fff;
    }
</style>

<div class="container usuario">
    <h1>Cadastrar Cliente</h1>
    
    <nav>
        <ul>
            <li><a href="/users">Listar</a></li>
            <li><a class="active" href="{{ route('users.create') }}">Cadastrar</a></li>    
        </ul>
    </nav>
    
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="col-100">
            <label for="name">Nome:</label>
            <input type="text" name="name" placeholder="Nome" required>
        </div>
        <div class="col-100">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Email" required>
        </div>

        @if (session()->has('message'))
            <div class="info col-100"> {{ session()->get('message') }} </div>
        @endif

        <button type="submit">Cadastrar</button>
    </form>
</div>

@endsection
