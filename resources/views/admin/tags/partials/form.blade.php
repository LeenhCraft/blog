<div class="form-group">
    {!! Form::label('name', 'Nombre', ['class' => 'text-dark']) !!}
    {!! Form::text('name', $tag->tag_name, [
        'class' => 'form-control',
        'placeholder' => 'ingrese el nombre del categoria',
    ]) !!}

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug', ['class' => 'text-dark']) !!}
    {!! Form::text('slug', $tag->tag_slug, [
        'class' => 'form-control',
        'placeholder' => 'ingrese el slug de la categoria',
        'readonly',
    ]) !!}
    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('color', 'Color:', []) !!}
    {!! Form::select('color', $colors, $tag->tag_color, ['class' => 'form-control']) !!}
    @error('color')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
