@extends('layouts.app')

@section('content')
    <h1>Supplier</h1>
    <form action="{{ route('suppliers.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <input type="text" name="supplier" class="form-control mt-2" placeholder="Supplier Name/Company">
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <input type="text" name="address" class="form-control mt-2" placeholder="Address">
        </div>
    </div>


    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <input type="text" name="email_address" class="form-control mt-2" placeholder="Email Address">
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <input type="text" name="contact_number" class="form-control mt-2" placeholder="Contact Number">
        </div>
    </div>
    <button type="submit"class="btn btn-primary mt-2">Submit</button>

    </form>

@endsection
