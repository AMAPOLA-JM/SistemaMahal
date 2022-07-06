@extends('adminlte::page')

@section('content')
    @foreach ($categories as $category)
        {{ $category }}
    @endforeach
@endsection
