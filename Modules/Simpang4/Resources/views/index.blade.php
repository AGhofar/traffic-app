@extends('simpang4::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('simpang4.name') !!}
    </p>
@endsection
