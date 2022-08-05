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
                                @foreach ($incomings as $incoming)
                                <h5> <b>Registrador:</b></h5>
                                <h5 class="text-center">{{$incoming->name}} {{$incoming->surname_user}}</h5>
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
@endsection
