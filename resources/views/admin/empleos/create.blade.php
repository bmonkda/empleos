@extends('adminlte::page')

@section('title', 'Dasboard')

@section('content_header')
    <h1>Crear empleos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.empleos.store', 'autocomplete' => 'off']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del empleo']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug:') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del empleo', 'readonly']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Categoría:') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Modalidad</p>

                    @foreach ($modos as $modo)

                        <label class="mr-2">
                            {!! Form::checkbox('modos[]', $modo->id, null) !!}
                            {{ $modo->name }}
                        </label>
                        
                    @endforeach
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                    <label class="mr-2">
                        {!! Form::radio('status', 1, true) !!}
                        BORRADOR
                    </label>
                    
                    <label>
                        {!! Form::radio('status', 2) !!}
                        PUBLICADO
                    </label>
                </div>

                <div class="form-group">
                    {!! Form::label('extracto', 'Extracto:') !!}
                    {!! Form::textarea('extracto', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el extracto del empleo']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripción:') !!}
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción del empleo']) !!}
                </div>

                {!! Form::submit('Crear empleo', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}            
        </div>
    </div>   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
        .create( document.querySelector( '#extracto' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#descripcion' ) )
        .catch( error => {
            console.error( error );
        } );
        
    </script>
@endsection