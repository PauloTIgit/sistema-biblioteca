@extends('layout.master')
@extends('layout.menu')

@section('content')

<style>
    .container.usuario {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;  /* Fundo branco para o conteúdo */
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
        border: solid 1px #007bff;  /* Bordas azuis */
        color: #007bff;  /* Texto azul */
        transition: all 0.3s ease;
        border-radius: 5px;
    }

    .usuario nav ul li a:hover, 
    .usuario nav ul li a.active {
        background-color: #007bff;  /* Azul de fundo no hover */
        color: #fff;  /* Texto branco no hover */
    }

    .usuario .col-100 {
        margin-bottom: 20px;
    }

    .usuario .content {
        padding: 2rem 0;
    }

    .usuario .button {
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

    .usuario .button:hover {
        background-color: #0056b3;  /* Azul mais escuro no hover */
    }

    .usuario .actions {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .usuario .actions form,
    .usuario .actions button {
        margin: 0;
        height: 100%;
    }

    .info {
        background: #28a745;  /* Cor verde para mensagens de sucesso */
        padding: .5rem .3rem;
        color: #fff;
        margin-bottom: 20px;
    }

    .btn-danger {
        background-color: #dc3545;  /* Vermelho para o botão de excluir */
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-danger:hover {
        background-color: #c82333;  /* Vermelho mais escuro no hover */
    }
</style>

<div class="container usuario">
    <h1>Visualizar Cliente</h1>
    <div class="content">
        <div class="col-100">
            <p><strong>Nome:</strong> {{ $user->name }}</p>
        </div>
        <div class="col-100">
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="info col-100"> {{ session()->get('message') }} </div>
    @endif

    <div class="actions">
        <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn-danger" type="submit" aria-label="Excluir {{ $user->name }}">Excluir</button>
        </form>

        <a class="btn button" href="/users">Voltar</a>
    </div>
</div>

@endsection
