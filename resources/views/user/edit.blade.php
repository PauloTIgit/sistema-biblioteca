@extends('layout.master')
@extends('layout.menu')

@section('content')

<style>
    .container.usuario {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;  /* Fundo branco */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .usuario nav {
        padding: 10px 0;
        margin-bottom: 20px;
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
        border: solid 1px #007bff;  /* Bordas em azul */
        color: #007bff;  /* Texto azul */
        transition: all 0.3s ease;
        border-radius: 5px;
    }

    .usuario nav ul li a:hover, 
    .usuario nav ul li a.active {
        background-color: #007bff;  /* Cor de fundo azul */
        color: #fff;  /* Texto branco no hover */
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
        border: 1px solid #ccc;  /* Borda cinza */
        border-radius: 5px;
        font-size: 14px;
    }
    
    .usuario form button {
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

    .usuario form button:hover {
        background-color: #0056b3;  /* Azul mais escuro no hover */
    }

    .info {
        background: #28a745;  /* Cor verde para mensagens */
        padding: .5rem .3rem;
        color: #fff;
        margin-bottom: 20px;
    }
</style>

<div class="container usuario">
    <h1>Editar Cliente</h1>
    
    <nav>
        <ul>
            <li><a href="/users">Listar</a></li>
            <li><a href="{{ route('users.create') }}">Cadastrar</a></li>    
        </ul>
    </nav>
    
    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        
        <div class="col-100">
            <label for="name">Nome:</label>
            <input type="text" name="name" required value="{{ $user->name }}">
        </div>
        
        <div class="col-100">
            <label for="email">Email:</label>
            <input type="email" name="email" required value="{{ $user->email }}">
        </div>

        @if (session()->has('message'))
            <div class="info col-100"> {{ session()->get('message') }} </div>
        @endif

        <button type="submit">Editar</button>
    </form>
</div>

@endsection
