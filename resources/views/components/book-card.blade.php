<li class="user-card">
    <h2> {{ $book->name }}</h2>
    <p>  {{ $book->author }}</p>
    <p></p>
    <div class="actions">
        <a class="btn btn-secondary" href="{{ route('books.edit', ['book' => $book->id]) }}">Editar</a> 
        <a class="btn btn-secondary" href="{{ route('books.show', ['book' => $book->id]) }}">Visualizar</a> 
    </div>
</li>