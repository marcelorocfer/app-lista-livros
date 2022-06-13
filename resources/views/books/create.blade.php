@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs col-md col-lg">
            <div>
                <a href="{{ route('books.index') }}" class="btn btn-secondary text-end mb-4">
                    <i class="fas fa-circle-chevron-left"></i> Voltar
                </a>
            </div>
            <form action="{{ route('books.store') }}" method="post" class="card">
                <div class="card-header">
                    <i class="fas fa-circle-plus"></i> Criar Novo Livro
                </div>
                <div class="card-body">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Título</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                        class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Descrição</label>
                        <textarea type="text" name="description"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Autor</label>
                        <input type="text" name="author" value="{{ old('author') }}"
                        class="form-control @error('author') is-invalid @enderror">
                        @error('author')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Número de Páginas</label>
                        <input type="number" name="number_pages" value="{{ old('number_pages') }}"
                        class="form-control @error('number_pages') is-invalid @enderror">
                        @error('number_pages')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-floppy-disk"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
