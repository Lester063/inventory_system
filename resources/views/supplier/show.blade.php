@extends('layouts.app')

@section('content')
    <h1>Name/Company: {{$supplier->supplier}}</h1>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Item</th>
            <th>Quantity</th>
        </tr>
        <?php $x=0;?>
        @foreach($getSupplier_stocks as $stocks)
        <?php $x++?>
        <tr>
            <td>{{$x}}</td>
            <td>{{$stocks->item_name}}</td>
            <td>{{$stocks->restock_quantity}}</td>
        </tr>
        @endforeach
    </table>
@endsection
