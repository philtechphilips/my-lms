@extends('studentLearning.index')


@section('content')
@php
    $name = Auth::user()->name;
    echo "<h1>Welcome $name</h1>";
@endphp
@endsection

@section('scripts')

@endsection
