@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>Nuevo Proveedor</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-danger" style="width:100%;" href="{{route('suppliers.index')}}" role="button">Retroceder</a>
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
                <i class="fa fa-check"> Detalles del Proveedor</i>
            </div>
            <form class="" action="{{route('suppliers.store')}}" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_supplier">Empresa</label>
                        <input class="form-control" type="text" id="name_supplier" name="name_supplier" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="seller_supplier">Vendedor</label>
                        <input class="form-control" type="text" id="seller_supplier" name="seller_supplier" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="city_supplier">Ciudad</label>
                        <input class="form-control" type="text" id="city_supplier" name="city_supplier" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_supplier">N° Celular</label>
                        <input class="form-control" type="number" id="contact_supplier" name="contact_supplier" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="status_supplier">Estado</label>
                        <select class="form-control select2" name="status_supplier" id="status_supplier" required>
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
