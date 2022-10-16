@extends('adminlte::page')

@section('title', 'index')

@section('content_header')
    <h1>Lista de categorías</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Crear categoria</a>
        </div>
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->idcategorie }}</td>
                            <td>{{ $category->cat_name }}</td>
                            <td width="10px"><a class="btn btn-sm btn-primary"
                                    href="{{ route('admin.categories.edit', $category->idcategorie) }}">Editar</a></td>
                            <td width="10px">
                                <form action="{{ route('admin.categories.destroy', $category->idcategorie) }}"
                                    method="POST">
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
