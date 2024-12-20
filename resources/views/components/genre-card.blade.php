<li class="user-card">
    <h2> {{ $genre->name }}</h2>
    <div class="actions">
        <a class="btn btn-secondary" href="{{ route('genres.edit', ['genre' => $genre->id]) }}">Editar</a> 
        <a class="btn btn-secondary" href="{{ route('genres.show', ['genre' => $genre->id]) }}">Visualizar</a> 
    </div>
</li>