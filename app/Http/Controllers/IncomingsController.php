<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Incoming;
use Auth;

class IncomingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type_user == 0) {
            $incomings = DB::table('incomings')
                ->join('users', 'users.id', '=', 'incomings.id_user')
                ->select('id_incoming', 'name', 'surname_user', 'date_incoming', 'total_price_incoming', 'status_incoming')
                ->orderByDesc('id_incoming')
                ->limit(100)
                ->get();
        }else {
            $incomings = DB::table('incomings')
                ->join('users', 'users.id', '=', 'incomings.id_user')
                ->select('id_incoming', 'name', 'surname_user', 'date_incoming', 'total_price_incoming', 'status_incoming')
                ->where('id_user', Auth::user()->id)
                ->orderByDesc('id_incoming')
                ->limit(100)
                ->get();
        }
        return view('incomings.incomings')->with('incomings', $incomings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $incomings = DB::table('incomings')
            ->join('users', 'users.id', '=', 'incomings.id_user')
            ->select('id_incoming', 'name', 'surname_user', 'date_incoming', 'total_price_incoming')
            ->where('id_incoming', $id)
            ->get();

        $detailincoming = DB::table('details_incoming')
            ->join('items', 'items.id_item', '=', 'details_incoming.id_item')
            ->join('brands', 'brands.id_brand', '=', 'items.id_brand')
            ->select('id_details_incoming', 'name_item', 'name_brand', 'size_item', 'numbers_details_incoming', 'total_price_details_incoming')
            ->where('id_incoming', $id)
            ->get();

        return view('incomings.show')->with(array('incomings'=>$incomings, 'detailincoming'=>$detailincoming));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $incomings = DB::table('incomings')
            ->where('id_user', Auth::user()->id)
            ->orderByDesc('id_incoming')
            ->limit(1)
            ->get();

        foreach ($incomings as $incomin) {
            $val = $incomin->id_incoming;
            $estado = $incomin->status_incoming;
        }

        $detailincoming = DB::table('details_incoming')
            ->join('items', 'items.id_item', '=', 'details_incoming.id_item')
            ->join('brands', 'brands.id_brand', '=', 'items.id_brand')
            ->select('id_details_incoming', 'name_item', 'name_brand', 'size_item', 'numbers_details_incoming', 'total_price_details_incoming')
            ->where('id_incoming', $val)
            ->orderByDesc('id_details_incoming')
            ->get();

        $items = DB::table('items')
            ->join('brands', 'items.id_brand', '=', 'brands.id_brand')
            ->select('items.id_item', 'items.name_item', 'items.size_item', 'brands.name_brand')
            ->get();

        return view('incomings.register')->with(array('incomings'=>$incomings, 'detailincoming'=>$detailincoming, 'estado'=>$estado, 'items'=>$items, 'id'=>$val));
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
        $incoming = Incoming::findOrFail($request->id);
        $incoming->status_incoming = 1;
        $incoming->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incoming = Incoming::destroy($id);
        return back();
    }
}
