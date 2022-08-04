@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>Nueva Categoria</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-danger" style="width:100%;" href="{{route('categories.index')}}" role="button">Retroceder</a>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-secondary">
                <i class="fa fa-check"> Detalles de la Categoria</i>
            </div>
            <form class="" action="{{route('categories.store')}}" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_category">Nombre</label>
                        <input class="form-control" type="text" id="name_category" name="name_category" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="description_category">Descripción</label>
                        <textarea class="form-control" name="description_category" id="description_category" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="state_category">Descripción</label>
                        <select class="form-control select2" name="state_category" id="state_category" required>
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
