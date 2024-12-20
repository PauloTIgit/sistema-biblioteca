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
        background-color: #333;
        color: #fff;
    }

    .genero .col-100 {
        margin-bottom: 20px;
    }

    .genero .col-100 p {
        border: solid 1px #63636373;
        padding: .5rem .3rem;
    }

    .genero .content{
        padding: 2rem 0;
    }
   
    .genero .button {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .genero .actions {
        display: flex;
        justify-content: space-between;
    }
    .genero .actions form,
    .genero .actions button{
        margin: 0;
        height: 100%;
    }

    .info {
        background: #d07d01;
        padding: .5rem .3rem;
        color: #fff;
    }
</style>

<div class="container genero">
    <h1>Visualizar Gênero</h1>
    <div class="content">
        <div class="col-100">
            <p><strong>Nome:</strong> {{ $genre->name }}</p>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="info col-100"> {{ session()->get('message') }} </div>
    @endif

    <div class="actions">
        <form action="{{ route('genres.destroy', ['genre' => $genre->id]) }}" method="POST" style="display:inline; height: 3rem;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger " type="submit" aria-label="Excluir {{ $genre->name }}">Excluir</button>
        </form>
    
        <a class="btn button" href="/genres">Voltar</a> 
    </div>

</div>

@endsection
