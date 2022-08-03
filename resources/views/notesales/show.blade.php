@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>Detalle de la venta {{$notesale->id_note_sale}}</h2>
    </div>
    <div class="col-sm-2">

        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-danger" style="width:100%;" href="{{route('notesales.index', ['tipo'=>1])}}" role="button">Retroceder</a>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="table-responsive">
        <div class="col-sm-12">
            <table class="table table-hover">
                <thead class="bg-dark">
                    <tr>
                        <th>Codigo</th>
                        <th>Cliente</th>
                        <th>Vendedor</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Monto Total</th>
                        <th colspan="2" class="text-center">Acción</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
