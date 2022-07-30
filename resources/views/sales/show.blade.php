@extends('layouts.app')

@section('content')
    <a href="/sales" class="btn btn-default">Go Back</a>
    <h2>Name(Optional): {{$mysales->buyer_name}}</h2>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
        </tr>
        <?php $x=0;?>
    @foreach($sales as $sale)
        <?php $x++?>
        <tr>
            <td width="30px"><b>{{$x}}.</b></td>
            <td>{{$sale->item_name}}</td>
            <td>{{$sale->salesItem_quantity}}</td>
            <td>{{$sale->item_price}}</td>
            <td>{{$sale->item_price * $sale->salesItem_quantity}}</td>
            <?php $getsum+=$sale->item_price * $sale->salesItem_quantity?>
        </tr>
    @endforeach
        <tr>
            <td colspan=4><b>Total:</b></td>
            <td><b>{{$getsum}}</b></td>
        </tr>
    </table>
@endsection
