<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ReStock;
use App\Models\Supplier;
class ReStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /*
        $id=$request->id;
        $item=Item::find($id);
        $suppliers=Supplier::all();

        return view('restock.create')->with('item',$item)->with('suppliers',$suppliers);
        */
    }
    public function restockska($id)
    {
        $item=Item::find($id);
        $suppliers=Supplier::all();

        return view('restock.create')->with('item',$item)->with('suppliers',$suppliers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the inputs
        $request->validate([
            'supplier_id'=>'required',
            'item_id'=>'required',
            'restock_quantity'=>'required'
        ]);

        //add the quantity to the designated id in Items table
        $item=Item::find($request->input('item_id'));
        $qty_item=$item->item_quantity;
        $restock_addqty=$qty_item+$request->input('restock_quantity');
        $item->update([
            'item_quantity'=>$restock_addqty
        ]);


        $restock=ReStock::create([
            'supplier_id'=>$request->input('supplier_id'),
            'item_id'=>$request->input('item_id'),
            'restock_quantity'=>$request->input('restock_quantity'),
        ]);
        return redirect()->route('item.index')->with('success','ReStock Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
