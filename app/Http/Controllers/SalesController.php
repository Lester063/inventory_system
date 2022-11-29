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
        /*
        $item= Item::find($id);
        $mysales=MySale::all();
        $sales=Sales::where('item_id',$id)->join('my_sales','my_sales.sales_code','=','sales.sales_code')->get(['sales.*','my_sales.*']);
        */
        $numnum=0;
        $totalSales=0;
        $items=Item::all();
        $sales=Sales::orderBy('sales.created_at','desc')->join('items','items.id','=','sales.item_id')->get(['sales.*','items.*']);
        return view('sales.index')->with('sales',$sales)->with('totalSales',$totalSales)->with('items',$items)->with('numnum',$numnum);
        /*
        $sales=Sales::orderBy('created_at','desc')->paginate(10);
        return view('sales.index')->with('sales',$sales)->with('totalSales',$totalSales);
        */
    }

    public function indexess(Request $request)
    {
        $fromDate=$request->itemsalesfromDate;
        $toDate=$request->itemsalestoDate;
        $itemsFilter=$request->itemsFilter;
        if(!$request->ajax()){
            $sales=Sales::latest()->paginate(10);
            return view('sales.salesdatacontainer')->with('sales',$sales);
        }
        else{
            $items=Item::all();
            if($itemsFilter){
                $sales=Sales::whereIn('sales.item_id',$itemsFilter)->whereBetween('sales.sold_date', [$fromDate, $toDate])->join('items','items.id','=','sales.item_id')->get(['sales.*','items.*']);
            }else if($itemsFilter==''){
                $sales=Sales::whereBetween('sales.sold_date', [$fromDate, $toDate])->join('items','items.id','=','sales.item_id')->get(['sales.*','items.*']);
            }
            $numnum=$sales->count();
            return view('sales.salesdatacontainer')->with('sales',$sales)->with('numnum',$numnum);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }
}
