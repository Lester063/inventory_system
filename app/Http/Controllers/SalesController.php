<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\MySale;
use App\Models\Item;
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_sales=MySale::orderBy('created_at','desc')->paginate(5);
        return view('sales.index')->with('my_sales',$my_sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items=Item::all();
        return view('sales.create')->with('items',$items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'item_id'=>'required',
            'salesItem_quantity'=>'required',
        ]);
        $get_mysale=MySale::count();
        //$getId=$get_mysale->id;
        $theId=$get_mysale+1;
        $scode="SA".$theId;

        foreach(array_combine($request->input('item_id'),$request->input('salesItem_quantity')) as $item_id => $qty){
            $item=Item::find($item_id);
            $get_item_qty=$item->item_quantity;
            $getnew_itemQty=$get_item_qty-$qty;

            $getPrice=$item->item_price;
            //solution for the sales_totalPrice --in sales table
            $price=$getPrice*$qty;

            $sales=Sales::create([
                'sales_code'=>$scode,
                'item_id'=>$item_id,
                'salesItem_quantity'=>$qty,
                'sales_totalPrice'=>$price
            ]);

            $item->update([
                'item_quantity'=>$getnew_itemQty
            ]);

        }

        $get_totalPrice=Sales::where('sales_code',$scode)->sum('sales_totalPrice');
        $sale=MySale::create([
            'sales_code'=>$scode,
            'buyer_name'=>$request->input('buyer_name'),
            'total_price'=>$get_totalPrice,
        ]);



        return redirect()->route('sales.index')->with('error','Added sales successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mysales=MySale::find($id);
        $code=$mysales->sales_code;
        $item=Item::all();
        $getsum=0;
        $sales=Sales::where('sales_code',$code)->join('items','sales.item_id','=','items.id')->get(['sales.*','items.*']);
        return view('sales.show')->with('mysales',$mysales)->with('sales',$sales)->with('getsum',$getsum);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mysales=MySale::find($id);
        $scode=$mysales->sales_code;
        $sales=Sales::where('sales_code',$scode)->get();

        $items=Item::all();




        return view('sales.edit')->with('sales',$sales)->with('items',$items)->with('mysales',$mysales);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_id'=>'required',
            'salesItem_quantity'=>'required'
        ]);
        $mysales=MySale::find($id);
        $sales_code=$mysales->sales_code;

        foreach(array_combine($request->input('item_id'),$request->input('salesItem_quantity')) as $item_id => $qty){
            $check_item=Item::find($item_id);
            $get_Itemqty=$check_item->item_quantity;
            $item_name=$check_item->item_name;
            if($qty>$get_Itemqty){
                return redirect()->route('sales.index')->with('error','Some of the quantity inputs('.$item_name. ') are greater than the stocks we have.');
            }

        }

        foreach(array_combine($request->input('item_id'),$request->input('salesItem_quantity')) as $item_id => $qty){
            $item=Item::find($item_id);


            //get the price of each item then multiply to quantity(input)
            $getPrice=$item->item_price;
            $price=$getPrice*$qty;

            $sales=Sales::where('sales_code',$sales_code)->where('item_id',$item_id)->first();


            //get the old quantity item of the Sales per item then add it to the quantity of Items
            $getItem_qty=$item->item_quantity;
            $getSales_qty=$sales->salesItem_quantity;
            $addQtys=$getItem_qty+$getSales_qty;



                $item->update([
                    'item_quantity'=>$addQtys
                ]);
                //after getting back the total quantity of Items, minus the total quantity to the new input from edit
                $getNew_qty=$addQtys-$qty;
                $item->update([
                    'item_quantity'=>$getNew_qty
                ]);


                $sales->update([
                    'item_id'=>$item_id,
                    'salesItem_quantity'=>$qty,
                    'sales_totalPrice'=>$price
                ]);


        }

        $get_totalPrice=Sales::where('sales_code',$sales_code)->sum('sales_totalPrice');
        $mysales->update([
            'sales_code'=>$sales_code,
            'total_price'=>$get_totalPrice,
        ]);

        return redirect()->route('sales.index')->with('success','Updated Sales Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $mysales=MySale::find($id);
        $get_salescode=$mysales->sales_code;


        $sales=Sales::where('sales_code',$get_salescode);
        $sales->delete();

        $mysales->delete();


        return redirect()->route('sales.index')
        ->with('success','Item deleted successfully');
    }
}
