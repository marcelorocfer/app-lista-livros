@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs col-md col-lg">
            <div>
                <a href="{{ route('books.index') }}" class="btn btn-secondary text-end mb-4">
                    <i class="fas fa-circle-chevron-left"></i> Voltar
                </a>
            </div>
            <div class="card">
                <div class="card-header">
                    Detalhes do Livro
                </div>
                <div class="card-body">
                    <p>Título: <strong>{{ $book->title }}</strong></p>
                    <p>Descrição: <strong>{{ $book->description }}</strong></p>
                    <p>Nome do Autor: <strong>{{ $book->author }}</strong></p>
                    <p>Número de Páginas: <strong>{{ $book->number_pages }}</strong></p>
                    <p>Cadastrado em: <small class="text-muted">{{ $book->created_at->format('d/m/Y H:i:s') }}</small></p>
                    <p>Atualizado em: <small class="text-muted">{{ $book->updated_at->format('d/m/Y H:i:s') }}</small></p>
                </div>
            </div>
        </div>
    </div>
@endsection
