<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Item;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('items')
            ->join('categories', 'items.id_category', '=', 'categories.id_category')
            ->join('brands', 'items.id_brand', '=', 'brands.id_brand')
            ->select('items.id_item', 'items.name_item', 'items.size_item', 'items.stock', 'items.unit_price_item', 'items.wholesale_price_item', 'items.description_item', 'brands.name_brand', 'categories.name_category')
            ->get();
        $usertype = auth()->user()->type_user;
        return view('items.items')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')
            ->select('id_category', 'name_category')
            ->get();
        $brands = DB::table('brands')
            ->select('id_brand', 'name_brand')
            ->get();
        return view('items.nuevo')->with(array('categories'=>$categories, 'brands'=>$brands));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $item = Item::destroy($id);
        return redirect()->route('items.index');
    }
}
