@extends('adminlte::page')

@section('content')
    @foreach ($notesales as $notesale)
        {{$notesale}}
    @endforeach
@endsection
