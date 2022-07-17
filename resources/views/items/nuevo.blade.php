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
                        <h3 class="card-title">Color & Time Picker</h3>
                    </div>
                    <div class="card-body">
                        <!-- Color Picker -->
                        <div class="form-group">
                            <label>Color picker:</label>
                            <input type="text" class="form-control my-colorpicker1">
                        </div>
                        <!-- /.form group -->

                        <!-- Color Picker -->
                        <div class="form-group">
                            <label>Color picker with addon:</label>

                            <div class="input-group my-colorpicker2">
                                <input type="text" class="form-control">

                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- time Picker -->
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Time picker:</label>

                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" />
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Color & Time Picker</h3>
            </div>
            <div class="card-body">
                <!-- Color Picker -->
                <div class="form-group">
                    <label>Color picker:</label>
                    <input type="text" class="form-control my-colorpicker1">
                </div>
                <!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                    <label>Color picker with addon:</label>

                    <div class="input-group my-colorpicker2">
                        <input type="text" class="form-control">

                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                        </div>
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- time Picker -->
                <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Time picker:</label>

                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" />
                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Color & Time Picker</h3>
            </div>
            <div class="card-body">
                <!-- Color Picker -->
                <div class="form-group">
                    <label>Color picker:</label>
                    <input type="text" class="form-control my-colorpicker1">
                </div>
                <!-- /.form group -->

                <!-- Color Picker -->
                <div class="form-group">
                    <label>Color picker with addon:</label>

                    <div class="input-group my-colorpicker2">
                        <input type="text" class="form-control">

                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                        </div>
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- time Picker -->
                <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Time picker:</label>

                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" />
                            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
