<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\ReStock;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::orderBy('created_at','desc')->paginate(5);
        return view('supplier.index')->with('suppliers',$suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
            'supplier'=>'required',
            'address'=>'required',
            'email_address'=>'required',
            'contact_number'=>'required'
        ]);

        $suppliers=Supplier::create([
            'supplier'=>$request->input('supplier'),
            'address'=>$request->input('address'),
            'email_address'=>$request->input('email_address'),
            'contact_number'=>$request->input('contact_number'),
        ]);

        return redirect()->route('suppliers.index')->with('success','Added Supplier Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier=Supplier::find($id);
        $awe=ReStock::all()->where('supplier_id',$id);

        $getSupplier_stocks=ReStock::where('supplier_id',$id)->join('items','re_stocks.item_id','=','items.id')
        ->get(['re_stocks.*','items.*']);

        return view('supplier.show')->with('supplier',$supplier)->with('awe',$awe)->with('getSupplier_stocks',$getSupplier_stocks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers=Supplier::find($id);
        return view('supplier.edit')->with('suppliers',$suppliers);
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
            'supplier'=>'required',
            'address'=>'required',
            'email_address'=>'required',
            'contact_number'=>'required',
        ]);
        $supplier=Supplier::find($id);
        $supplier->update([
            'supplier'=>$request->input('supplier'),
            'address'=>$request->input('address'),
            'email_address'=>$request->input('email_address'),
            'contact_number'=>$request->input('contact_number'),
        ]);
        $suppliers=Supplier::find($id);
        return redirect()->route('suppliers.index')->with('suppliers',$suppliers)->with('success','Updated Supplier Data Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier=Supplier::find($id);
        $supplier_name=$supplier->supplier;
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success','Deleted Supplier('.$supplier_name.') Successfully');
    }
}
