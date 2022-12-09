@if(count($sales) > 0)
    <table class="tables"id="tables"style="width:100%">
    
        <tr>
            <th style="width:40%">Item</th>
            <th style="width:20%">Sales Code</th>
            <th style="width:20%">Sales Item Quantity</th>
            <th style="width:20%">Sales Total Price</th>
        </tr>
        @foreach($sales as $sale)
            <tr id="trs">
                <td>{{$sale->item_name}}</td>
                <td>{{$sale->sales_code}}</td>
                <td>{{number_format($sale->salesItem_quantity)}}</td>
                <td>{{number_format($sale->sales_totalPrice)}}</td>
            </tr>

        @endforeach
        
    </table>

        
    @else
    <table class="table">
    <tr>
            <th>Sales Code</th>
            <th>Sales Item Quantity</th>
            <th>Sales Total Price</th>
        </tr>
    </table>
    <p>No Sales found</p>
    @endif