@extends('layouts.app')

@section('content')

    <h1>Suppliers</h1><a href="suppliers/create"class="btn btn-primary">Add Supplier</a>
    @if(count($suppliers) > 0)
    <table class="table">
        <tr>
            <th>#</th>
            <th>Name/Company</th>
            <th>Address</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Action</th>
            <th>View</th>
        </tr>
        <?php $x=0;?>
        @foreach($suppliers as $supplier)
        <?php $x++?>
            <tr>
                <td><b>{{$x}}.</b></td>
                <td>{{$supplier->supplier}}</td>
                <td>{{$supplier->address}}</td>
                <td>{{$supplier->email_address}}</td>
                <td>{{$supplier->contact_number}}</td>
                <td>
                <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <a class="btn btn-primary"style="width:80px;" href="{{ route('suppliers.edit',$supplier->id) }}">Edit</a>
                    <button class="btn btn-danger"style="width:80px;" onclick="return confirm('Are you sure?')">Delete</button></td>
                </form>
                <td><a href="suppliers/{{$supplier->id}}">View</a></td>
            </tr>

        @endforeach

    </table>
        {{$suppliers->links('pagination::bootstrap-4')}}
    @else
    <p>No Supplier found</p>
    @endif

@endsection
