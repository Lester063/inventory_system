@extends('layouts.app')

@section('content')
    <h1>Add Item</h1>
    <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Item Name:</strong>
		            <input type="text" name="item_name"id="item_name" class="form-control" placeholder="Item Name"  autocomplete="itemname" autofocus>
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Item Code:</strong>
		            <input type="text" name="item_code"id="item_code" class="form-control" placeholder="Item Code"  autocomplete="itemcode" autofocus>
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Item Quantity:</strong>
		            <input type="number" name="item_quantity"id="item_quantity" class="form-control" placeholder="Item Quantity"  autocomplete="itemquantity" autofocus>
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Item Price:</strong>
		            <input type="number" name="item_price"id="item_price" class="form-control" placeholder="Item Price"  autocomplete="itemprice" autofocus>
		        </div>
		    </div>



        <button type="submit" class="btn btn-primary" onClick="address">Submit</button>
    </form>
@endsection
