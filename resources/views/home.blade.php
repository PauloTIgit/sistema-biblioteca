@extends('layout.master')
@extends('layout.menu')

@section('content')

<div class="container mt-5">
    <div class="text-center">
        <h1 class="display-4">Bem-vindo à Biblioteca</h1>
        <p class="lead text-muted mt-3">Gerencie usuários e livros de forma eficiente e organizada.</p>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card shadow-sm border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Usuários Registrados <i class="ph ph-user"></i></h5>
                        <p class="card-text fs-4">
                            <strong>{{ $userCount }}</strong>
                        </p>
                        <i class="bi bi-people fs-1 text-primary"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm border-success">
                    <div class="card-body">
                        <h5 class="card-title text-success">Livros Registrados <i class="ph ph-book"></i></h5>
                        <p class="card-text fs-4">
                            <strong>{{ $bookCount }}</strong>
                        </p>
                        <i class="bi bi-book fs-1 text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
