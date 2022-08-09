@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>Nueva Marca</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-danger" style="width:100%;" href="{{route('brands.index')}}" role="button">Retroceder</a>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-light">
                <i class="fa fa-check"> Detalles de la Marca</i>
            </div>
            <form class="" action="{{route('brands.store')}}" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_supplier">Proveedor</label>
                        <div class="row">
                            <div class="col-sm-10 mb-1">
                                <select class="form-control" name="id_supplier" id="id_supplier" required>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{$supplier->id_supplier}}">{{$supplier->name_supplier}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-outline-success" style="width:100%;" href="{{route('suppliers.create')}}" role="button">Nuevo Proveedor</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name_brand">Marca</label>
                        <input class="form-control" type="text" id="name_brand" name="name_brand" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="status_brand">Estado</label>
                        <select class="form-control select2" name="status_brand" id="status_brand" required>
                            <option value="0" selected>Activado</option>
                            <option value="1">Desactivado</option>
                        </select>
                    </div>
                    @csrf
                    <div class="col-sm-12">
                        <button type="submit" style="width:100%;" class="btn btn-info">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
