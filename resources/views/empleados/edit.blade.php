@extends('welcome')

@section('content')
    <h1>editar empleado</h1>
    <div class="alert alert-info">
        Los campos marcados con asterisco (*) son obligatorios
    </div>
    <a href="{{ route('empleados')}}" class="btn btn-danger">Volver</a>
    <hr>
    {!! Form::open(['route' => ['empleados.update', $empleado], 'method' => 'put']) !!}
        <div class="form-group">
            <div class="row g-3">
                <div class="col-sm-5">
                    {{ Form::label('empleado_nombres', 'Nombre completo', ['class' => 'form-label mr-sm-4']) }}
                </div>

                <div class="col-sm-7">
                    {{ Form::text('empleado_nombres', $empleado->empleado_nombres, ['class' => 'form-control sm-8', 'placeholder' => 'Nombre completo del empleado', 'required']) }}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row g-3">
                <div class="col-sm-5">
                    {{ Form::label('empleado_email', 'Correo electrónico') }}
                </div>
                <div class="col-sm-7">
                    {{ Form::email('empleado_email', $empleado->empleado_email, ['class' => 'form-control', 'placeholder' => 'Correo electrónico', 'required']) }}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row g-3">
                <div class="col-sm-5">
                    {{ Form::label('empleado_sexo', 'Sexo') }}
                </div>
                <div class="col-sm-7">
                    @if($empleado->empleado_sexo === "M")
                        {{ Form::radio('empleado_sexo', 'M', true, ['class' => 'form-control', 'required']) }} Masculino
                        {{ Form::radio('empleado_sexo', 'F', false, ['class' => 'form-control', 'required']) }} Femenino
                    @else
                        {{ Form::radio('empleado_sexo', 'M', false, ['class' => 'form-control', 'required']) }} Masculino
                        {{ Form::radio('empleado_sexo', 'F', true, ['class' => 'form-control', 'required']) }} Femenino
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row g-3">
                <div class="col-sm-5 align-right">
                    {{ Form::label('area_id', 'Área') }}
                </div>
                <div class="col-sm-7">
                    {{ Form::select('area_id', $areas->pluck('area_nombre', 'area_id'), $empleado->area_id, ['class' => 'form-control', 'placeholder' => 'Selecionar', 'required']) }}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row g-3">
                <div class="col-sm-5">
                    {{ Form::label('empleado_experiencia', 'Descrpción') }}
                </div>
                <div class="col-sm-7">
                    {{ Form::textarea('empleado_experiencia', $empleado->empleado_experiencia, ['class' => 'form-control', 'placeholder' => 'Descripción de la experiencia del empleado', 'required']) }}
                </div>
            </div>
        </div>

        <div class="form-group">
            @if($empleado->empleado_boletin === "S")
                {{ Form::checkbox('empleado_boletin', 'S', true, ['class' => 'form-control']) }}
            @else
                {{ Form::checkbox('empleado_boletin', 'S', false, ['class' => 'form-control']) }}
            @endif

            {{ Form::label('empleado_boletin', 'Deseo recibir boletín informativo') }}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"><span class="fas fa-save"></span> Guardar Cambios</button>
        </div>
    {!! Form::close() !!}
@endsection
