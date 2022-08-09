@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-8">
        @if ($tipo==0)
            <h2>Venta Por Menor</h2>
        @else
            <h2>Venta Por Mayor</h2>
        @endif
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-success disabled" style="width:100%;" href="{{route('notesales.index')}}" role="button">Retroceder</a>
            </div>
        </div>
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
            <div class="card-header bg-light">
                <i class="fas fa-detail"> Codigo de Venta: {{$id}}
                </i>
                <div class="card-tools">
                    @if ($estado == 2)
                        <a class="btn btn-danger text-center" href="{{route('notesales.edit', ['id'=>$id])}}"> Pagar</a>
                    @elseif($estado == 1)
                        <a class="btn btn-warning text-center" href="{{route('notesales.edit', ['id'=>$id])}}"> Entregar</a>
                    @else
                        <a class="btn btn-primary disabled " href=""> Entregado</a>
                    @endif
                </div>
            </div>
            <div class="card-body py-0">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-10">
                                @foreach ($notesales as $notesale)
                                <b>Fecha de Venta:</b>
                                <p class="text-center my-0">{{$notesale->date_note}}</p>
                                <b>DNI Cliente:</b>
                                <p class="text-center my-0">{{$notesale->dni_client}}</p>
                                <b>Tel Cliente:</b>
                                <p class="text-center my-0">{{$notesale->tel_client}}</p>
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
                                <b>Nombre Cliente:</b>
                                <p class="text-center my-0">{{$notesale->name_client}} {{$notesale->surname_client}}</p>
                                <b>Vendedor:</b>
                                <p class="text-center my-0">{{$notesale->name}}</p>
                                <b>Monto Total:</b>
                                <p class="text-center my-0">S/ {{$notesale->total_import_note}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($estado == 2)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-detail"> Añadir Prenda:</i>
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
                    <div class="form">
                        @if ($error == 2)
                            <div class="alert alert-danger" role="alert">
                                <b>Revisar la Cantidad en Almacén</b>
                            </div>
                        @endif
                        <form class="" action="{{route('detnotesale.store')}}" method="post">
                            <div class="row">
                                <input type="hidden" name="id_note_sale" value="{{$id}}">
                                <input type="hidden" name="type_note_sale" value="{{$tipo}}">
                                <div class="col-sm-6 ">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="id_item">Prenda:</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="form-group ">
                                                        <div class="form-control">
                                                        <x-adminlte-select2 class="" name="id_item" id="id_item" required>
                                                            @foreach ($items as $item)
                                                            <option value="{{$item->id_item}}">{{$item->name_item}} Marca {{$item->name_brand}} Talla {{$item->size_item}} Stock: {{$item->stock}}</option>
                                                            @endforeach
                                                        </x-adminlte-select2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="quantity_note_detail">Cantidad:</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" id="quantity_note_detail" name="quantity_note_detail" value="" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                                <div class="col-sm-12">
                                    <button type="submit" style="width:100%;" class="btn btn-info">Insertar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
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
                                <th>Marca</th>
                                <th class="col-2">Precio Total</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notedetail as $note)
                                <tr>
                                    <td>{{$note->id_note_detail}}</td>
                                    <td>{{$note->name_item}} Talla: {{$note->size_item}}</td>
                                    <td>{{$note->quantity_note_detail}}</td>
                                    @if ($tipo == 0)
                                        <td>S/ {{$note->unit_price_item}}</td>
                                    @else
                                        <td>S/ {{$note->wholesale_price_item}}</td>
                                    @endif
                                    <td>{{$note->name_brand}}</td>
                                    <td>S/ {{$note->total_price_note_detail}}</td>
                                    <td class="text-center col-1"><a class="btn btn-danger" href="{{route('detnotesale.destroy', ['id'=>$note->id_note_detail])}}" role="button">Eliminar</a></td>
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
