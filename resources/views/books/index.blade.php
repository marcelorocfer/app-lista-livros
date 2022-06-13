@extends('layouts.app')

@section('content')

    @if (session('store'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Livro Criado!</strong> O livro foi criado com Sucesso!
            <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Livro Atualizado!</strong> O livro foi atualizado com Sucesso!
            <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('destroy'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Livro Excluído!</strong> O livro foi excluído com Sucesso!
            <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card mb-5">
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    <a href="{{ route('books.create') }}" class="btn btn-outline-dark">
                        <i class="fas fa-circle-plus"></i> Cadastrar Livro
                    </a>
                </div>
                <form action="?" class="col-auto ms-auto">
                    <div class="input-group">
                        <input type="text" name="search" value="{{ request()->search }}"
                            placeholder="Filtrar..." class="form-control shadow-none">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-hover m-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Autor</th>
                        <th>Número de Páginas</th>
                        <th>Data de Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ Str::limit($book->description, 25) }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->number_pages }}</td>
                            <td>{{ $book->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('books.show', ['book' => $book->id]) }}" class="btn btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('books.edit', ['book' => $book->id]) }}" class="btn btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-sm delete" type="button"
                                    data-url="{{ route('books.destroy', ['book' => $book->id]) }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body pb-0">
            {{ $books->appends(['search' => request()->search])->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
@endsection

@push('modal')
    <div class="modal" tabindex="-1" id="modalDelete">
        <div class="modal-dialog">
            <form action="" method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-trash"></i> Excluir
                    </h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    <p>Tem certeza que deseja excluir?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" type="submit">Excluir</button>
                </div>
            </form>
        </div>
    </div>
@endpush

@push('js')
    <script>
        $(function(){
            let modalDelete = new bootstrap.Modal($('#modalDelete'));
            $('.delete').click(function(){
                let url = $(this).attr('data-url');
                $('#modalDelete form').attr('action', url);
                modalDelete.show();
            })
        })
    </script>
@endpush


