<div class="user-card">
    <div class="container">
        <h2><strong>Cliente:</strong> {{ $loan->user->name ?? 'Usuário não encontrado' }}</h2>
        <p><strong>Livro:</strong> {{ $loan->book->name ?? 'Livro não encontrado' }}</p>
        <p class="due_date">Devolução: {{ $loan->due_date }}</p>
    </div>
    <div class="actions">
        <a class="btn btn-secondary" href="{{ route('loans.edit', ['loan' => $loan->id]) }}">Editar</a>
        <a class="btn btn-secondary" href="{{ route('loans.show', ['loan' => $loan->id]) }}">Visualizar</a>
    </div>
</div>
