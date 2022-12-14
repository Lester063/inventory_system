@if(count($my_sales) > 0)
    <table class="table">
        <tr>
            <th>Sales Code</th>
            <th>Buyer Name(Optional)</th>
            <th>Sales Total Price</th>
            <th>Sold Date</th>
            <th>Action</th>
            <th>View</th>
        </tr>
        @foreach($my_sales as $my_sale)
            <tr>
                <td>{{$my_sale->sales_code}}</td>
                <td>{{$my_sale->buyer_name}}</td>
                <td>{{number_format($my_sale->total_price)}}</td>
                <td>{{$my_sale->sold_date}}</td>
                <?php $totalSales+=$my_sale->total_price?>
                <td>
                    <form action="{{ route('mysales.destroy',$my_sale->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <a class="btn btn-primary"style="width:80px;" href="{{ route('mysales.edit',$my_sale->id) }}">Edit</a>
                        <button class="btn btn-danger"style="width:80px;" onclick="return confirm('Are you sure?')">Delete</button>
                </td>
                    </form>
                <td><a href="mysales/{{$my_sale->id}}">Sales Breakdown</a></td>
            </tr>

        @endforeach
    </table>
        
    @else
    <table class="table">
        <tr>
            <th>Sales Code</th>
            <th>Buyer Name(Optional)</th>
            <th>Sales Total Price</th>
            <th>Sales Item Quantity</th>
            <th>Action</th>
            <th>View</th>
        </tr>
    </table>
    <p>No Sales found</p>
    @endif