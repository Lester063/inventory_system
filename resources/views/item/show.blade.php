@extends('layouts.app')

@section('content')
    <a href="/item" class="btn btn-default">Go Back</a>
    <h1>{{$item->item_name}}</h1>

@endsection
