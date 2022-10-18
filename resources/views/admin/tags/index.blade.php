@extends('adminlte::page')

@section('title', 'Etiquetas')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('admin.tags.create') }}">Nueva etiqueta</a>
    <h1>Mostrar listado de etiquetas</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        {{-- <div class="card-header">
            <a href="{{ route('admin.tags.create') }}" class="btn btn-success">Crear etiqueta</a>
        </div> --}}
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->idtag }}</td>
                            <td>{{ $tag->tag_name }}</td>
                            <td width="10px"><a class="btn btn-sm btn-primary"
                                    href="{{ route('admin.tags.edit', $tag->idtag) }}">Editar</a></td>
                            <td width="10px">
                                <form action="{{ route('admin.tags.destroy', $tag->idtag) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
