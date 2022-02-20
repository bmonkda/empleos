@extends('adminlte::page')

@section('title', 'Dasboard')

@section('content_header')
    <h1>Lista de categoría</h1>
@stop

@section('content')
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
                            <td>
                                <a href="">Editar</a>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div> 
@stop