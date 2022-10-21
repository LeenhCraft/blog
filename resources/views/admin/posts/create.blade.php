@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nuevo post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese nombre del Post',
                    'autocomplete' => 'off',
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el slugo del Post',
                    'readonly',
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('idcategory', 'Categoria') !!}
                {!! Form::select('idcategory', $categories, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <p class="font-weight-bold">Etiquetas:</p>
                @foreach ($tags as $tag)
                    <label class="mr-2">
                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                        {{ $tag->tag_name }}
                    </label>
                @endforeach
            </div>
            <div class="form-group">
                <p class="font-weight-bold">Estado</p>
                <label class="mr-2">
                    {!! Form::radio('status', 1, true) !!}
                    Borrador
                </label>
                <label>
                    {!! Form::radio('status', 2) !!}
                    Publicar
                </label>
            </div>
            <div class="form-group">
                {!! Form::label('extract', 'Extracto') !!}
                {!! Form::textarea('extract', null, [
                    'class' => 'form-control',
                    'rows' => '2',
                ]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Contenido del Post') !!}
                {!! Form::textarea('body', null, [
                    'class' => 'form-control',
                    // 'rows' => '2',
                ]) !!}
            </div>
            {!! Form::submit('Crear Post', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('/vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
            ClassicEditor
                .create(document.querySelector('#extract'))
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#body'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
