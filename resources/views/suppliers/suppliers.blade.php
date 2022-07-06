@extends('adminlte::page')

@section('content')
    @foreach ($suppliers as $supplier)
        {{ $supplier }}
    @endforeach
@endsection
