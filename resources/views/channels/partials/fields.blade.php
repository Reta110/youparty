<div class="form-group">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nombre del canal']) !!}

</div>

<div class="form-group">
    {!! Form::label('Imagen') !!}
    {!! Form::file('image', ['class' => 'form-control']) !!}
</div>