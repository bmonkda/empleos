@extends('adminlte::page')

@section('title', 'Dasboard')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.modos.create') }}"> Agregar modalidad</a>
    <h1>Listado modalidad</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{ session('info') }} </strong>
        </div>
    @endif

    <div class="card">

        {{-- <div class="card-header">
        </div> --}}

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
                    @foreach ($modos as $modo)
                        <tr>
                            <td>{{$modo->id}}</td>
                            <td>{{$modo->name}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.modos.edit', $modo) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.modos.destroy', $modo) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>   
@stop