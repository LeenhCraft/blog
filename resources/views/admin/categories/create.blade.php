@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1>Crear nueva categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre', ['class' => 'text-dark']) !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre del categoria']) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug', ['class' => 'text-dark']) !!}
                {!! Form::text('slug', null, [
                    'class' => 'form-control',
                    'placeholder' => 'ingrese el slug de la categoria',
                    'readonly',
                ]) !!}
                @error('slug')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {!! Form::submit('Crear categoria', ['class' => 'btn btn-primary']) !!}
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
