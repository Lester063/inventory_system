@extends('layouts.app')

@section('content')
    <h1>Items</h1><a href="item/create"class="btn btn-primary">Add Item</a>
    @if(count($items) > 0)
    <table class="table">
        <tr>
            <th>Item Name</th>
            <th>Item Code</th>
            <th>Item Quantity</th>
            <th>Item Price</th>
            <th>Action</th>
            <th>View</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td>{{$item->item_name}}</td>
                <td>{{$item->item_code}}</td>
                <td>{{$item->item_quantity}}</td>
                <td>{{$item->item_price}}</td>
                <td>
                <form action="{{ route('item.destroy',$item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <a class="btn btn-primary"style="width:80px;" href="{{ route('item.edit',$item->id) }}">Edit</a>
                    <button class="btn btn-danger"style="width:80px;" onclick="return confirm('Are you sure?')">Delete</button>
                    <a class="btn btn-primary"style="width:80px;" href="restockska/{{$item->id}}">ReStock</a>
                </td>
                </form>
                <td><a href="item/{{$item->id}}">View</a></td>
            </tr>

        @endforeach

    </table>
        {{$items->links('pagination::bootstrap-4')}}
    @else
    <p>No item found</p>
    @endif
@endsection
