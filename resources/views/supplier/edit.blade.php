@extends('layouts.app')

@section('content')
    <a href="/suppliers" class="btn btn-default">Go Back</a>
    <h2>{{$suppliers->supplier}}</h2>
<form action="{{route('suppliers.update',$suppliers->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Supplier(Name/Company):</label>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <input type="text" name="supplier" value="{{$suppliers->supplier}}"class="form-control mt-2" placeholder="Supplier Name/Company">
        </div>
    </div>

    <div class="row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Address: </label>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <input type="text" name="address" value="{{$suppliers->address}}"class="form-control mt-2" placeholder="Address">
        </div>
    </div>

    <div class="row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email Address: </label>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <input type="text" name="email_address" value="{{$suppliers->email_address}}"class="form-control mt-2" placeholder="Address">
        </div>
    </div>

    <div class="row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Contact#: </label>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <input type="text" name="contact_number" value="{{$suppliers->contact_number}}" class="form-control mt-2" placeholder="Contact Number">
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Update</button>

</form>

@endsection
