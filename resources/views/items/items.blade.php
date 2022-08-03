@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-8">
        <h2>INVENTARIO</h2>
    </div>
    <div class="col-sm-4">

        <div class="input-group input-group-sm">
            <div class="">
                <a class="btn btn-outline-success btn-sm" href="{{route('items.create')}}" role="button">Nuevo Item</a>
            </div>
            &nbsp;
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                </button>
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
                            <th>ID</th>
                            <th>Categoria</th>
                            <th>Marca</th>
                            <th>Nombre</th>
                            <th>Talla</th>
                            <th>Stock</th>
                            <th>P._Menor</th>
                            <th>P._Mayor</th>
                            <th>Descripción</th>
                            @if (auth()->user()->type_user == 0)
                            <th colspan="2">Acción</th>
                            @endif
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{$item->id_item}}</td>
                        <td>{{$item->name_category}}</td>
                        <td>{{$item->name_brand}}</td>
                        <td>{{$item->name_item}}</td>
                        <td>{{$item->size_item}}</td>
                        <td>{{$item->stock}}</td>
                        <td>{{$item->unit_price_item}}</td>
                        <td>{{$item->wholesale_price_item}}</td>
                        <td class="col-4">{{$item->description_item}}</td>
                        @if (auth()->user()->type_user == 0)
                        <td><a class="btn btn-success btn-sm" href="#" role="button">Editar</a></td>
                        <td><a class="btn btn-danger btn-sm" href="{{route('items.destroy', ['id' => $item->id_item])}}" role="button">Eliminar</a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
