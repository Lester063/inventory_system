@extends('layouts.app')

@section('content')
<h1>Add Sales<button class="btn btn-primary add_new_input"id="add_new_input">Add</button></h1>
<input type="text"value=1 id="addnum_box">
<input type="text"value=1 id="totalnum_box">
    <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="col-xs-12 col-sm-12 col-md-12">
		    <div class="form-group">
		        <input type="text" name="buyer_name" class="form-control" placeholder="Buyer Name"  autocomplete="buyername" autofocus>
		    </div>
		</div>
<div>
        <div class="row mt-3 mb-2" id="input_sales">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <select name="item_id[]"class="form-select" required>
                    <option value="">SELECT ITEM</option>
                @foreach($items as $item)
                    <option value="{{$item->id}}">{{$item->item_name}}</option>
                @endforeach
                </select>
		    </div>

            <div class="col-xs-4 col-sm-4 col-md-4 form-group">
		        <input type="number" name="salesItem_quantity[]" class="form-control" placeholder="Sales Item Quantity" required autocomplete="salesitemquantity" autofocus>
		    </div>
            <div class="col-xs-1 col-sm-1 col-md-1 form-group">
                <button class="remove_input_sales btn btn-danger"id="remove_input_sales"onclick="remove()">X</button>
            </div>
        </div>

</div>






        <button type="submit" class="btn btn-primary" onClick="address">Submit</button>
    </form>


@endsection
