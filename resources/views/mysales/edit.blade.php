@extends('layouts.app')

@section('content')
    <h1>Edit Sales</h1>
    <form action="{{route('mysales.update',$mysales->id)}}" method="POST">
    	@csrf
        @method('PUT')
        @foreach($sales as $sale)
<div class="row mt-3 mb-2" id="input_sales">

        <div class="col-xs-6 col-sm-6 col-md-6">
            <select name="item_id[]"  class="form-select" required>
                <option value="">SELECT ITEM</option>
            @foreach($items as $item)
                <option value="{{$item->id}}" {{ $item->id == $sale->item_id ? 'selected' : '' }}>{{$item->item_name.$item->item_quantity}}</option>
            @endforeach
            </select>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4 form-group">
            <input type="text" name="salesItem_quantity[]" value="{{$sale->salesItem_quantity}}"class="form-control" maximum="40" placeholder="Sales Item Quantity" required autocomplete="salesitemquantity" autofocus>
        </div>

        <div class="col-xs-1 col-sm-1 col-md-1 form-group">
            <button class="remove_input_sales"id="remove_input_sales">X</button>
        </div>


</div>

        @endforeach






        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
