@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-8">
        <h2>ENTRADAS</h2>
    </div>
    <div class="col-sm-4">

        <div class="input-group input-group-sm">
            <div class="">
                <a class="btn btn-outline-success btn-sm" href="{{route('incomings.edit')}}" role="button">Registrar</a>
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
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover">
                    <thead class="bg-dark">
                        <tr>
                            <th>#</th>
                            <th>Registro</th>
                            <th>Fecha</th>
                            <th>Monto Total</th>
                            <th>Estado</th>
                            @php $val = 0; @endphp
                            @foreach ($incomings as $incoming)
                                @if ($incoming->total_price_incoming == 0)
                                    @php $val = 1; @endphp
                                @endif
                            @endforeach
                            @if ($val == 1)
                                <th colspan="2" class="text-center">Acción</th>
                            @else
                                <th colspan="1" class="text-center">Acción</th>
                            @endif
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($incomings as $incoming)
                    <tr>
                        <td>{{$incoming->id_incoming}}</td>
                        <td>{{$incoming->name}} {{$incoming->surname_user}}</td>
                        <td>{{$incoming->date_incoming}}</td>
                        <td>S/ {{$incoming->total_price_incoming}}</td>
                        @if ($incoming->status_incoming == 0)
                            <td class="text-center"> <a href="" class="disabled btn btn-success">En Proceso</a> </td>
                        @else
                            <td class="text-center"> <a href="" class="btn disabled btn-warning">Registrado</a> </td>
                        @endif
                        @if ($incoming->total_price_incoming == 0)
                            <td class="text-right col-2"><a class="btn btn-success" href="{{route('incomings.show', ['id'=>$incoming->id_incoming])}}" role="button"><i class="fa fa-eye"></i> Ver Detalles</a></td>
                            <td class="text-center col-1"><a class="btn btn-danger" href="{{route('incomings.destroy', ['id'=>$incoming->id_incoming])}}" role="button">Eliminar</a></td>
                        @else
                            <td class="col-2 text-center" colspan="2"><a class="btn btn-success" href="{{route('incomings.show', ['id'=>$incoming->id_incoming])}}" role="button"><i class="fa fa-eye"></i> Ver Detalles</a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
