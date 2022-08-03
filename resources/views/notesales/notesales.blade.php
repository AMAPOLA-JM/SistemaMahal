@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-8">
        <h2>VENTAS REALIZADAS</h2>
    </div>
    <div class="col-sm-4">

        <div class="input-group input-group-sm">
            <div class="">
                <a class="btn btn-outline-success btn-sm" href="{{route('notesales.create', ['tipo'=>1])}}" role="button">Nueva Venta</a>
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
                    @foreach ($notesales as $notesale)
                    <tr>
                        <td>{{$notesale->id_note_sale}}</td>
                        <td>{{$notesale->name_client}} {{$notesale->surname_client}}</td>
                        <td>{{$notesale->name}}</td>
                        <td>{{$notesale->date_note}}</td>
                        @if ($notesale->state_note == 0)
                            <td><a class="btn btn-primary disabled" href=""> Entregado</a> </td>
                        @elseif ($notesale->state_note == 1)
                            <td><a class="btn btn-warning" href="{{route('notesales.edit', ['id'=>$notesale->id_note_sale])}}"> Entregar</a> </td>
                        @elseif ($notesale->state_note == 2)
                            <td><a class="btn btn-danger" href="{{route('notesales.edit', ['id'=>$notesale->id_note_sale])}}"> Cancelar</a> </td>
                        @endif
                        <td>{{$notesale->total_import_note}}</td>
                        <td class="text-right"><a class="btn btn-success" href="{{route('notesales.show', ['id'=>$notesale->id_note_sale])}}" role="button"><i class="fa fa-eye"></i> Ver Detalles</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
