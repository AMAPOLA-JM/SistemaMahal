<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DetailIncoming;
use App\Models\Incoming;
use App\Models\Item;
use Auth;

class DetailsIncomingController extends Controller
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
        $item = Item::findOrFail($request->id_item);
        $item->stock += $request->numbers_details_incoming;
        $item->save();

        $incoming = Incoming::findOrFail($request->id_incoming);
        $incoming->total_price_incoming += $request->total_price_details_incoming;
        $incoming->save();

        $detailincoming = new DetailIncoming;
        $detailincoming->fill($request->all());
        $detailincoming->save();
        return back();
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
        $id_incoming = DB::table('details_incoming')
            ->select('id_incoming', 'total_price_details_incoming')
            ->where('id_details_incoming', '=', $id)
            ->get();

        foreach ($id_incoming as $id_incomin) {
            $ids = $id_incomin->id_incoming;
            $price = $id_incomin->total_price_details_incoming;
        }

        $incoming = Incoming::findOrFail($ids);
        $incoming->total_price_incoming -= $price;
        $incoming->save();

        $detailincomin = DetailIncoming::destroy($id);
        return back();
    }
}
