@extends('adminlte::page')

@section('content')
    @foreach ($clients as $client)
        {{ $client }}
    @endforeach
@endsection
