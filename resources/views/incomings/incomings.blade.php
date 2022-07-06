@extends('adminlte::page')

@section('content')
    @foreach ($incomings as $incoming)
        {{ $incoming }}
    @endforeach
@endsection
