@extends('adminlte::page')

@section('title', 'Dasboard')

@section('content_header')
    <h1>Editar empleos</h1>
@stop

@section('content')

    @if ( session('info') )
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($empleo, ['route' => ['admin.empleos.update', $empleo], 'autocomplete' => 'off', 'files' => true, 'method' => 'PUT']) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                @include('admin.empleos.partials.form')

                {!! Form::submit('Actualizar empleo', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}            
        </div>
    </div>   
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
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

        // Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById("picture").setAttribute('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
        
    </script>
@endsection