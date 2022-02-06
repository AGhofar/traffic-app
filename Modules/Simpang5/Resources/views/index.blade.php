@extends('simpang5::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('simpang5.name') !!}
    </p>
@endsection
