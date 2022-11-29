@if(count($sales) > 0)
    <table class="table">
    {{$numnum}}
        <tr>
            <th>Item</th>
            <th>Sales Code</th>
            <th>Sales Item Quantity</th>
            <th>Sales Total Price</th>
        </tr>
        @foreach($sales as $sale)
            <tr>
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