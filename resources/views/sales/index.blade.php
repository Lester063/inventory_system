@extends('layouts.app')

@section('content')

    <h1>Sales</h1><a href="sales/create"class="btn btn-primary">Add Sales</a>
    @if(count($my_sales) > 0)
    <table class="table">
        <tr>
            <th>Sales Code</th>
            <th>Buyer Name(Optional)</th>
            <th>Sales Total Price</th>
            <th>Sales Item Quantity</th>
            <th>Action</th>
            <th>View</th>
        </tr>
        @foreach($my_sales as $my_sale)
            <tr>
                <td>{{$my_sale->sales_code}}</td>
                <td>{{$my_sale->buyer_name}}</td>
                <td>{{$my_sale->total_price}}</td>
                <td>{{$my_sale->created_at}}</td>
                <td>
                <form action="{{ route('sales.destroy',$my_sale->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <a class="btn btn-primary"style="width:80px;" href="{{ route('sales.edit',$my_sale->id) }}">Edit</a>
                    <button class="btn btn-danger"style="width:80px;" onclick="return confirm('Are you sure?')">Delete</button></td>
                </form>
                <td><a href="sales/{{$my_sale->id}}">View</a></td>
            </tr>

        @endforeach

    </table>
        {{$my_sales->links('pagination::bootstrap-4')}}
    @else
    <p>No item found</p>
    @endif

@endsection
