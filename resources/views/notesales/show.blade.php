@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>Detalle de la venta</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-danger" style="width:100%;" href="{{route('notesales.index')}}" role="button">Retroceder</a>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-detail"> Codigo de Venta:
                        @foreach ($notesales as $notesale)
                        {{$notesale->id_note_sale}}
                        @endforeach
                    </i>
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <i class="fas ">
                            <h4>MAHAL</h4>
                        </i>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-10">
                                @foreach ($notesales as $notesale)
                                <h5> <b>Fecha de Venta:</b></h5>
                                <h5 class="text-center">{{$notesale->date_note}}</h5>
                                <h5> <b>DNI Cliente:</b></h5>
                                <h5 class="text-center">{{$notesale->dni_client}}</h5>
                                <h5> <b>Tel Cliente:</b></h5>
                                <h5 class="text-center">{{$notesale->tel_client}}</h5>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-10">
                                @foreach ($notesales as $notesale)
                                <h5><b>Estado de Venta:</b></h5>
                                @if ($notesale->state_note == 0)
                                <div class="text-center">
                                    <a class="btn btn-primary disabled " href=""> Entregado</a>
                                </div>
                                @elseif ($notesale->state_note == 1)
                                <div class="text-center">
                                    <a class="btn btn-warning text-center" href="{{route('notesales.edit', ['id'=>$notesale->id_note_sale])}}"> Entregar</a>
                                </div>
                                @elseif ($notesale->state_note == 2)
                                <div class="text-center">
                                    <a class="btn btn-danger btn-sm text-center" href="{{route('notesales.edit', ['id'=>$notesale->id_note_sale])}}"> Cancelar</a>
                                </div>
                                @endif
                                <h5><b>Nombre Cliente:</b></h5>
                                <h5 class="text-center">{{$notesale->name_client}} {{$notesale->surname_client}}</h5>
                                <h5><b>Vendedor:</b></h5>
                                <h5 class="text-center">{{$notesale->name}}</h5>
                                <h5><b>Monto Total:</b></h5>
                                <h5 class="text-center">S/ {{$notesale->total_import_note}}</h5>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-detail"> Detalle de Venta:</i>
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <i class="fas ">
                            <h4>MAHAL</h4>
                        </i>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-dark">
                            <tr>
                                <th>#</th>
                                <th>Prenda</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notedetail as $note)
                                <tr>
                                    <td>{{$note->id_note_detail}}</td>
                                    <td>{{$note->name_item}} {{$note->size_item}}</td>
                                    <td>{{$note->quantity_note_detail}}</td>
                                    <td>S/ {{$note->unit_price_item}}</td>
                                    <td>S/ {{$note->total_price_note_detail}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
