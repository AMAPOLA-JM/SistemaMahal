@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-10">
        <h2>EDITAR ITEM</h2>
    </div>
    <div class="col-sm-2">
        <div class="input-group input-group-sm">
            <div class="col-sm-12">
                <a class="btn btn-danger" style="width:100%;"  href="{{route('items.index')}}" role="button"><i class="fa fa-ban"></i> Cancelar</a>
            </div>
        </div>
    </div>
</div>

@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-light">
            <div class="card-header">
                <i class="fa fa-check"> Detalles de la Prenda: {{$item->id_item}}</i>
            </div>
            <form class="" action="{{route('items.update')}}" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" name="id_item" value="{{$item->id_item}}">
                            <div class="form-group">
                                <label for="id_category">Categoría</label>
                                <div class="row">
                                    <div class="col-sm-9 mb-1">
                                        <select class="form-control select2" name="id_category" id="id_category" required>
                                            @foreach ($categories as $categorie)
                                            <option value="{{$categorie->id_category}}" @if ($categorie->id_category == $item->id_category)
                                                selected
                                            @endif>{{$categorie->name_category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <a class="btn btn-outline-success" style="width:100%;" href="{{route('categories.create')}}" role="button">Nueva Categoria</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name_item">Prenda</label>
                                <input type="text" class="form-control" name="name_item" id="name_item" value="{{$item->name_item}}" required>
                            </div>
                            <div class="form-group">
                                <label for="size_item">Talla</label>
                                <input type="text" class="form-control" name="size_item" id="size_item" value="{{$item->size_item}}" required>
                            </div>
                            <div class="form-group">
                                <label for="description_item">Descripción</label>
                                <textarea name="description_item" id="description_item" class="form-control" rows="2" required>{{$item->description_item}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="id_brand">Marca</label>
                                <div class="row">
                                    <div class="col-sm-9 mb-1">
                                        <select class="form-control select2" name="id_brand" id="id_brand" required>
                                            @foreach ($brands as $brand)
                                            <option value="{{$brand->id_brand}}" @if ($brand->id_brand == $item->id_brand)
                                                selected
                                            @endif>{{$brand->name_brand}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <a class="btn btn-outline-success" style="width:100%;" href="{{route('brands.create')}}" role="button">Nueva Marca</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="unit_price_item">Precio Unitario S/</label>
                                <input type="number" class="form-control" step="any" name="unit_price_item" id="unit_price_item" value="{{$item->unit_price_item}}" required>
                            </div>
                            <div class="form-group">
                                <label for="wholesale_price_item">Precio Por Mayor S/</label>
                                <input type="number" class="form-control" step="any" name="wholesale_price_item" id="wholesale_price_item" value="{{$item->wholesale_price_item}}" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" style="width:100%;" class="btn btn-info">Enviar</button>
                        </div>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
