@extends('adminlte::page')
@section('content_header')
<div class="row">
    <div class="col-sm-12">
        <h2>NUEVO ITEM</h2>
    </div>
</div>

@stop
@section('content')
<div class="row">
    <div class="col-sm-7">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-info">
                    <div class="card-header">
                        <i class="fa fa-check"> Detalles de la Prenda</i>
                    </div>
                    <form class="" action="index.html" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category">Categoría</label>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <select class="form-control select2" name="category" id="category" required>
                                            @foreach ($categories as $categorie)
                                            <option value="{{$categorie->id_category}}">{{$categorie->name_category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 -1">
                                        <a class="btn btn-outline-primary" style="width:100%;" href="{{route('categories.create')}}" role="button">Nueva Categoria</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="brand">Marca</label>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <select class="form-control select2" name="brand" id="brand" required>
                                            @foreach ($brands as $brand)
                                            <option value="{{$brand->id_brand}}">{{$brand->name_brand}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <a class="btn btn-outline-primary" style="width:100%;" href="{{route('categories.create')}}" role="button">Nueva Marca</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="prenda">Prenda</label>
                                <input type="text" class="form-control" name="prenda" id="prenda" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="size">Talla</label>
                                <input type="text" class="form-control" name="size" id="size" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="unit_price">Precio Unitario S/</label>
                                <input type="number" class="form-control" name="unit_price" id="unit_price" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="wholesale_price">Precio Por Mayor S/</label>
                                <input type="number" class="form-control" name="wholesale_price" id="wholesale_price" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="text">Descripción</label>
                                <textarea name="text" id="text" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="">
                                <button type="submit" style="width:100%;" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-list mr-1"> Productos mas Vendidos</i>
                </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="card">
                        <div class="card-body p-0 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Marca</th>
                                        <th>Prenda</th>
                                        <th>Talla</th>
                                        <th class="text-right">N° de Compras</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-list mr-1"> Productos mas Vendidos</i>
                </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="card">
                        <div class="card-body p-0 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Marca</th>
                                        <th>Prenda</th>
                                        <th>Talla</th>
                                        <th class="text-right">N° de Compras</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
