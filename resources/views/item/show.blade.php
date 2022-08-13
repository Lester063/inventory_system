@extends('layouts.app')

@section('content')
    <a href="/item" class="btn btn-secondary">Go Back</a>
    <h1>{{"SOLD: ".$item->item_name}}</h1>
    <table class="table">
        <tr>
            <th>Sales Code</th>
            <th>Buyer Name</th>
            <th>Date & Time</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
        <?php
        $getqty=0;
        $getTotal=0;
        ?>
    @foreach($sales as $sale)

        <tr>
            <td>{{$sale->sales_code}}</td>
            <td>{{$sale->buyer_name}}</td>
            <td>{{$sale->created_at}}</td>
            <td>{{$sale->salesItem_quantity}}</td>
            <td>{{$sale->sales_totalPrice}}</td>


        </tr>
        <?php
        $getqty+=$sale->salesItem_quantity;
        $getTotal+=$sale->sales_totalPrice;
        ?>

    @endforeach
    <tr>
        <td colspan=3><b>Total:</b></td>
        <td><b>{{$getqty}}</b></td>
        <td><b>{{$getTotal}}</b></td>
    </tr>

@endsection
