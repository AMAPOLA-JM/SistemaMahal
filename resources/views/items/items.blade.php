@extends('adminlte::page')

@section('content')
    @foreach ($items as $item)
        {{ $item }}
    @endforeach
@endsection
