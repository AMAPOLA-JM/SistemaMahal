@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>Detalle de la Entrada</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-danger" style="width:100%;" href="{{route('incomings.index')}}" role="button">Retroceder</a>
            </div>
        </div>
    </div>
</div>
@stop
@section('content')
@if ($estado == 1)
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-light">
                <h3 class="card-title">
                    <i class="fas fa-detail"> Codigo de Entrada:
                        @foreach ($incomings as $incoming)
                        {{$incoming->id_incoming}}
                        @endforeach
                    </i>
                </h3>
                <div class="card-tools">
                    <a class="btn btn-warning disabled" href="" role="button">Registrado</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-10">
                                @foreach ($incomings as $incoming)
                                <h5> <b>Registrador:</b></h5>
                                <h5 class="text-center">{{auth()->user()->name}} {{auth()->user()->surname_user}}</h5>
                                <h5> <b>Monto Total:</b></h5>
                                <h5 class="text-center">S/ {{$incoming->total_price_incoming}}</h5>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-10">
                                @foreach ($incomings as $incoming)
                                <h5> <b>Fecha de Entrada:</b></h5>
                                <h5 class="text-center">{{$incoming->date_incoming}}</h5>
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
                    <i class="fas fa-detail"> Detalle de Entrada:</i>
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
                                <th>Marca</th>
                                <th>Prenda</th>
                                <th>Talla</th>
                                <th>Cantidad</th>
                                <th>Monto Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailincoming as $detailincomin)
                            <tr>
                                <td>{{$detailincomin->id_details_incoming}}</td>
                                <td>{{$detailincomin->name_brand}}</td>
                                <td>{{$detailincomin->name_item}}</td>
                                <td>{{$detailincomin->size_item}}</td>
                                <td>{{$detailincomin->numbers_details_incoming}}</td>
                                <td>S/ {{$detailincomin->total_price_details_incoming}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-light">
                <i class="fas fa-detail"> Codigo de Entrada:
                    @foreach ($incomings as $incoming)
                    {{$incoming->id_incoming}}
                    @endforeach
                </i>
                <div class="card-tools">
                    <a class="btn btn-success btn-sm" href="{{route('incomings.update', ['id'=>$id])}}" role="button">Completar</a>
                </div>
            </div>
            <div class="card-body py-0 ">
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="row">
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-10">
                                @foreach ($incomings as $incoming)
                                <b>Registrador:</b>
                                <p class="text-center my-0">{{auth()->user()->name}} {{auth()->user()->surname_user}}</p>
                                <b>Monto Total:</b>
                                <p class="text-center my-0">S/ {{$incoming->total_price_incoming}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-1">

                            </div>
                            <div class="col-sm-10">
                                @foreach ($incomings as $incoming)
                                <b>Fecha de Entrada:</b>
                                <p class="text-center my-0">{{$incoming->date_incoming}}</p>
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
                    <form class="" action="{{route('detincomings.store')}}" method="post">
                        <div class="row">
                            <input type="hidden" name="id_incoming" value="@foreach ($incomings as $incoming)
                            {{$incoming->id_incoming}}
                            @endforeach">
                            <div class="col-sm-4 ">
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
                                                        <option value="{{$item->id_item}}">{{$item->name_item}} de {{$item->name_brand}} Talla {{$item->size_item}}</option>
                                                        @endforeach
                                                    </x-adminlte-select2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="numbers_details_incoming">Cantidad:</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <input class="form-control" type="number" id="numbers_details_incoming" name="numbers_details_incoming" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="total_price_details_incoming">Monto Total:</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="total_price_details_incoming" name="total_price_details_incoming" value="" required>
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-detail"> Detalle de Entrada:</i>
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
                                <th>Marca</th>
                                <th>Prenda</th>
                                <th>Talla</th>
                                <th>Cantidad</th>
                                <th>Monto Total</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailincoming as $detailincomin)
                            <tr>
                                <td>{{$detailincomin->id_details_incoming}}</td>
                                <td>{{$detailincomin->name_brand}}</td>
                                <td>{{$detailincomin->name_item}}</td>
                                <td>{{$detailincomin->size_item}}</td>
                                <td>{{$detailincomin->numbers_details_incoming}}</td>
                                <td>S/ {{$detailincomin->total_price_details_incoming}}</td>
                                <td class="text-center col-1"><a class="btn btn-danger" href="{{route('detincomings.destroy', ['id'=>$detailincomin->id_details_incoming])}}" role="button">Eliminar</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
