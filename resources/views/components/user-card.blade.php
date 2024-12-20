<li class="user-card">
    <h2>{{ $user->name }}</h2>
    <p>{{ $user->email }}</p>
    <div class="actions">
        <a class="btn btn-secondary" href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a> 
        <a class="btn btn-secondary" href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a> 
    </div>
</li>