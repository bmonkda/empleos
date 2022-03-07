@extends('adminlte::page')

@section('title', 'Dasboard')

@section('content_header')
    {{-- @can('admin.categories.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('suscripciones.create') }}"> Agregar suscripción</a>
    @endcan --}}
    <h1>Lista de suscripciones</h1>
@stop

@section('content')

    {{-- @if (session('info'))
        <div class="alert alert-success">
            <strong> {{ session('info') }} </strong>
        </div>   
    @endif

    <div class="card">

        <div class="card-body">
            
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="10px">
                                @can('admin.categories.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.categories.destroy')
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>  --}}




    <div class="container py-8">
        <div class="form-group">
            <h1 class="text-4xl font-bold text-gray-600">Modalidad</h1>
            <p class="font-weight-bold">Seleccione Modalidad a suscribir</p>
        
            @foreach ($modos as $modo)
        
                <label class="mr-2">
                    {!! Form::checkbox('modos[]', $modo->id, null) !!}
                    {{ $modo->name }}
                </label>
                
            @endforeach
        
            @error('modos')
                <br>
                <small class="text-danger">{{ $message }}</small>
            @enderror
        
        </div>
        <br>
        <br>
        <div class="form-group">
            <h1 class="text-4xl font-bold text-gray-600">Categorías</h1>
            <p class="font-weight-bold">Seleccione Categorías a suscribir</p>
        
            @foreach ($categories as $category)
        
                <label class="mr-2">
                    {!! Form::checkbox('categoies[]', $category->id, null) !!}
                    {{ $category->name }}
                </label>
                
            @endforeach
        
            @error('categories')
                <br>
                <small class="text-danger">{{ $message }}</small>
            @enderror
        
        </div>
    </div>
    

    {!! Form::open(['route' => 'suscripciones.index', 'autocomplete' => 'off']) !!}

        {!! Form::submit('Suscribir', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!} 






@stop