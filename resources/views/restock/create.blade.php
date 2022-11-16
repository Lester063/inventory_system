@extends('layouts.app')

@section('content')
    <h1>Re-Stock Ka Muna</h1>
    <b>NG</b>
    <h2>{{$item->item_name}}</h2>

    <form action="{{route('restock.store')}}"method="POST">
        @csrf
        <input type="hidden" value="{{$item->id}}" name="item_id">
        <select name="supplier_id"required class="form-control mt-2">
            <option value="">Select Supplier</option>
        @foreach($suppliers as $supplier)
            <option value="{{$supplier->id}}">{{$supplier->supplier}}</option>
        @endforeach
        </select>

        <input type="number"name="restock_quantity"class="form-control mt-2" placeholder="Re-Stock Quantity" required>

        <input type="number"name="itemrestockprice"class="form-control mt-2" placeholder="Re-Stock Price" required>

        <button type="submit" class="btn btn-primary mt-2">Re-Stock</button>
    </form>
@endsection
