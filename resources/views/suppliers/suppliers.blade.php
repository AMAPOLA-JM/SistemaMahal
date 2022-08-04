@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>Proveedores</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-outline-success" style="width:100%;" href="{{route('suppliers.create')}}" role="button">Nuevo Proveedor</a>
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
                            <th>Proveedor</th>
                            <th>Vendedor</th>
                            <th>Ciudad</th>
                            <th>N° Celular</th>
                            <th class="text-center">Estado</th>
                            @if (auth()->user()->type_user == 0)
                            <th colspan="2" class="text-center">Acción</th>
                            @endif
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{$supplier->id_supplier}}</td>
                            <td>{{$supplier->name_supplier}}</td>
                            <td>{{$supplier->seller_supplier}}</td>
                            <td>{{$supplier->city_supplier}}</td>
                            <td>{{$supplier->contact_supplier}}</td>
                            @if ($supplier->status_supplier == 0)
                                <td class="text-center"> <a href="" class="disabled btn btn-success">Activo</a> </td>
                            @else
                                <td class="text-center"> <a href="" class="btn disabled btn-warning">Inactivo</a> </td>
                            @endif
                            @if (auth()->user()->type_user == 0)
                            <td class="text-center"><a class="btn btn-primary" href="{{route('suppliers.edit', ['id'=>$supplier->id_supplier])}}" role="button">Editar</a></td>
                            <td class="text-center"><a class="btn btn-danger" href="{{route('suppliers.destroy', ['id'=>$supplier->id_supplier])}}" role="button">Eliminar</a></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
