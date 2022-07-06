@extends('adminlte::page')

@section('content')
    @foreach ($brands as $brand)
        {{ $brand }}
    @endforeach
@endsection
