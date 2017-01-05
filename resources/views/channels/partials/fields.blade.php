<div class="form-group">
    {!! Form::label('name', 'Nombre: ') !!}
    {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nombre del canal']) !!}

</div>

<div class="form-group">
    {!! Form::label('Seleccione una imagen para el canal') !!}
    {!! Form::file('image', null,['class' => 'form-control']) !!}
</div>