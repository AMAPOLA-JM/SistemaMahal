<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Recibo {{$id}}</title>
    </head>
    <body>
<div class="">
    <div class="table table-responsive">
        <table  style="width: 100%;">
            <tr>
                <td colspan="3">
                    @if ($tipo==0)
                        <h2>Venta Por Menor</h2>
                    @else
                        <h2>Venta Por Mayor</h2>
                    @endif
                </td>
                <td> &nbsp; <b>NOTA DE VENTA N°:</b> {{$id}}</td>
            </tr>
            <tr>
                <td colspan="2"> Estado:
                    @if ($estado == 2)
                        <b>POR PAGAR</b>
                    @elseif($estado == 1)
                        <b>POR ENTREGAR</b>
                    @else
                        <b>COMPLETADO</b>
                    @endif
                </td>
                @foreach ($notesales as $notesale)
                <td><b>Fecha de Venta:</b></td>
                <td><p class="text-center my-0">{{$notesale->date_note}}</p></td>
            </tr>
            <tr>
                <td><b>DNI Cliente:</b></td>
                <td><p class="text-center my-0">{{$notesale->dni_client}}</p></td>
                <td><b>Tel Cliente:</b></td>
                <td><p class="text-center my-0">{{$notesale->tel_client}}</p></td>
                @endforeach
            </tr>
            <tr>
                @foreach ($notesales as $notesale)
                <td><b>Cliente:</b></td>
                <td><p class="text-center my-0">{{$notesale->name_client}} {{$notesale->surname_client}}</p></td>
                <td><b>Vendedor:</b></td>
                <td><p class="text-center my-0">{{$notesale->name}}</p></td>
                @endforeach
            </tr>
        </table>
        <br>
        <table class="table" border="1" style="width: 100%;">
            <thead class="bg-dark">
                <tr>
                    <th>#</th>
                    <th>Prenda</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Marca</th>
                    <th class="col-2">Precio Total</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <table class="table" style="width: 100%;" >
            <tr>
                @foreach ($notesales as $notesale)
                    <td><b>Monto Total:</b> </td>
                    <td><p class="text-center my-0"> <b>S/ {{$notesale->total_import_note}}</b> </p></td>
                @endforeach
            </tr>
        </table>
    </div>
</div>

</body>
