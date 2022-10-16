@extends('adminlte::page')

@section('title', 'Ediar')

@section('content_header')
    <h1>Editar categoria</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif  
    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category->idcategorie], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre', ['class' => 'text-dark']) !!}
                {!! Form::text('name', $category->cat_name, [
                    'class' => 'form-control',
                    'placeholder' => 'ingrese el nombre del categoria',
                ]) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug', ['class' => 'text-dark']) !!}
                {!! Form::text('slug', $category->cat_slug, [
                    'class' => 'form-control',
                    'placeholder' => 'ingrese el slug de la categoria',
                    'readonly',
                ]) !!}
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {!! Form::submit('Actualizar categoria', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('/vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
