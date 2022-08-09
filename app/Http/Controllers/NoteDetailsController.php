<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\NoteDetail;
use App\Models\NoteSale;
use App\Models\Item;
use Auth;

class NoteDetailsController extends Controller
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

        if ($item->stock < $request->quantity_note_detail) {
            return redirect()->route('notesales.show', ['id'=>$request->id_note_sale, 'error'=>2]);
        }else{
            $item->stock -= $request->quantity_note_detail;
            $item->save();

            $notedetail = new NoteDetail;
            $notedetail->id_note_sale = $request->id_note_sale;
            $notedetail->id_item = $request->id_item;
            $notedetail->quantity_note_detail = $request->quantity_note_detail;
            if ($request->type_note_sale == 0) {
                $notedetail->total_price_note_detail = $request->quantity_note_detail * $item->unit_price_item;
            }else {
                $notedetail->total_price_note_detail = $request->quantity_note_detail * $item->wholesale_price_item;
            }
            $notedetail->save();

            $notesale = NoteSale::findOrFail($request->id_note_sale);
            $notesale->total_import_note += $notedetail->total_price_note_detail;
            $notesale->save();
            return redirect()->route('notesales.show', ['id'=>$request->id_note_sale, 'error'=>1]);
        }


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
        $id_note_sale = DB::table('note_details')
            ->select('id_note_sale', 'total_price_note_detail', 'quantity_note_detail', 'id_item')
            ->where('id_note_detail', '=', $id)
            ->get();

        foreach ($id_note_sale as $id_note_sal) {
            $ids = $id_note_sal->id_note_sale;
            $price = $id_note_sal->total_price_note_detail;
            $stock = $id_note_sal->quantity_note_detail;
            $item = $id_note_sal->id_item;
        }

        $notesale = NoteSale::findOrFail($ids);
        $notesale->total_import_note -= $price;
        $notesale->save();

        $item = Item::findOrFail($item);
        $item->stock += $stock;
        $item->save();

        $detailnotelsae = NoteDetail::destroy($id);
        return back();
    }
}
