
<div class="row">
    <div class="col-sm-8">
        @if ($tipo==0)
            <h2>Venta Por Menor</h2>
        @else
            <h2>Venta Por Mayor</h2>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-light">
                <i class="fas fa-detail"> Codigo de Venta: {{$id}}
                </i>
                <div class="card-tools">
                    @if ($estado == 2)
                        <p>Por Pagar</p>
                    @elseif($estado == 1)
                        <p>Por Entregar</p>
                    @else
                        <p>Completado</p>
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-detail"> Detalle de Venta:</i>
                </h3>
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
                                @if ($estado == 2)
                                    <th>Acción</th>
                                @endif
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
                                    @if ($estado == 2)
                                    <td class="text-center col-1"><a class="btn btn-danger" href="{{route('detnotesale.destroy', ['id'=>$note->id_note_detail])}}" role="button">Eliminar</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
