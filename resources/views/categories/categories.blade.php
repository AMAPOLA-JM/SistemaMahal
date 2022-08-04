@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>CATEGORIAS</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-outline-success" style="width:100%;" href="{{route('categories.create')}}" role="button">Nueva Categoria</a>
            </div>
        </div>
    </div>
</div>

@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover">
                    <thead class="bg-dark">
                        <tr>
                            <th>#</th>
                            <th>Categoria</th>
                            <th>Descripción</th>
                            <th class="text-center">Estado</th>
                            @if (auth()->user()->type_user == 0)
                            <th colspan="2" class="text-center">Acción</th>
                            @endif
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($categories as $categorie)
                        <tr>
                            <td>{{$categorie->id_category}}</td>
                            <td>{{$categorie->name_category}}</td>
                            <td class="col-6">{{$categorie->description_category}}</td>
                            @if ($categorie->state_category == 0)
                                <td class="text-center"> <a href="" class="disabled btn btn-success">Activado</a> </td>
                            @else
                                <td class="text-center"> <a href="" class="btn disabled btn-warning">Desactivado</a> </td>
                            @endif
                            @if (auth()->user()->type_user == 0)
                            <td class="text-center col-1"><a class="btn btn-primary" href="{{route('categories.edit', ['id'=>$categorie->id_category])}}" role="button">Editar</a></td>
                            <td class="text-center col-1"><a class="btn btn-danger" href="{{route('categories.destroy', ['id'=>$categorie->id_category])}}" role="button">Eliminar</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
