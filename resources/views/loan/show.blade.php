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

    .locacao nav {
        padding: 10px 0;
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
        border: solid 1px #333;
        color: #000;
        transition: all 0.3s ease;
        border-radius: 5px;
    }

    .locacao nav ul li a.active, 
    .locacao nav ul li a:hover {
        background-color: #007bff;  /* Azul de fundo no hover */
        color: #fff;  /* Texto branco no hover */
    }

    .locacao .col-100 {
        margin-bottom: 20px;
    }

    .locacao .content{
        padding: 2rem 0;
    }
   
    .locacao .button {
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
    .locacao .button:hover {
        background-color: #0056b3;  /* Azul mais escuro no hover */
    }

    .locacao .actions {
        display: flex;
        justify-content: space-between;
    }
    .locacao .actions form,
    .locacao .actions button{
        margin: 0;
        height: 100%;
    }

    .locacao .container{
        padding: 2rem 0;
    }

    .info {
        background: #cea10f;
        padding: .5rem .3rem;
        color: #fff;
    }

    .return_date{
        font-size: .9rem;
        font-weight: 600;
        color: #891a1a;
    }
</style>

<div class="container locacao">
    <h1>Visualizar Cliente</h1>
    
    <div class="container">
        @foreach ($users as $user)
            @if ($loan->user_id == $user->id )
            <div>
                <p><strong>Cliente: </strong>{{ $user->name }}</p>
            </div>
            @endif
        @endforeach
        @foreach ($books as $book)
            @if ($loan->book_id == $book->id )
            <div>
                <div>
                    <p><strong>Livro:</strong> {{ $book->name }}</p>
                    <p><strong>Status:</strong> {{ $loan->status }}</p>
                </div>
                <div>
                    <p class="return_date">Devolução: {{ $loan->return_date }}</p>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    
    @if (session()->has('message'))
        <div class="info col-100"> {{ session()->get('message') }} </div>
    @endif

    <div class="actions">
        <form action="{{ route('loans.destroy', ['loan' => $loan->id]) }}" method="POST" style="display:inline; height: 3rem;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger " type="submit" aria-label="Excluir {{ $loan->name }}">Excluir</button>
        </form>
    
        <a class="btn button" href="/loans">Voltar</a> 
    </div>

</div>

@endsection
