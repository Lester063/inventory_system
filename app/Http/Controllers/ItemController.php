<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Sales;
use App\Models\MySale;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::orderBy('created_at','desc')->paginate(4);
        return view('item.index')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
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
            'item_name'=>'required',
            'item_quantity'=>'required',
            'item_price'=>'required'
        ]);
        $item=Item::create([
            'item_name'=>$request->input('item_name'),
            'item_code'=>$request->input('item_code'),
            'item_quantity'=>$request->input('item_quantity'),
            'item_price'=>$request->input('item_price'),
        ]);
        return redirect()->route('item.index')
        ->with('success','Item added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item= Item::find($id);
        $mysales=MySale::all();
        $sales=Sales::where('item_id',$id)->join('my_sales','my_sales.sales_code','=','sales.sales_code')->get(['sales.*','my_sales.*']);

        return view('item.show')->with('item',$item)->with('sales',$sales);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Item::find($id);
        return view('item.edit')->with('item',$item);
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
        request()->validate([
            'item_name' => 'required',
            'item_code' => 'required',
            'item_quantity' => 'required',
            'item_price' => 'required',
        ]);
        $item=Item::find($id);
        $item->update($request->all());
        return redirect()->route('item.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::find($id);
        $item->delete();

        return redirect()->route('item.index')
        ->with('success','Item deleted successfully');
    }


}
