<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use DB;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = DB::table('brands')
            ->join('suppliers', 'suppliers.id_supplier', '=', 'brands.id_supplier')
            ->select('id_brand', 'name_supplier', 'name_brand', 'status_brand')
            ->get();
        return view('brands.brands')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = DB::table('suppliers')
            ->select('id_supplier', 'name_supplier')
            ->get();
        return view('brands.nuevo')->with('suppliers', $suppliers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand;
        $brand->fill($request->all());
        $brand->save();
        return redirect('/brands');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = DB::table('suppliers')
            ->select('id_supplier', 'name_supplier')
            ->get();
        $brand = Brand::findOrFail($id);
        return view('brands.edit')->with(array('brand'=>$brand, 'suppliers'=>$suppliers));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $brand = Brand::findOrFail($request->id_brand);
        $brand->id_supplier = $request->id_supplier;
        $brand->name_brand = $request->name_brand;
        $brand->status_brand = $request->status_brand;
        $brand->save();
        return redirect('/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::destroy($id);
        return back();
    }
}
