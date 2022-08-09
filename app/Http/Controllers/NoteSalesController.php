<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\NoteSale;
use App\Models\Client;
use App\Models\Item;

class NoteSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type_user == 0) {
            $notesales = DB::table('note_sales')
                ->join('clients', 'clients.id_client', '=', 'note_sales.id_client')
                ->join('users', 'users.id', '=', 'note_sales.id_user')
                ->select('id_note_sale', 'name_client', 'surname_client', 'name', 'date_note', 'state_note', 'total_import_note')
                ->orderByDesc('id_note_sale')
                ->limit(150)
                ->get();
        }else {
            $notesales = DB::table('note_sales')
                ->join('clients', 'clients.id_client', '=', 'note_sales.id_client')
                ->join('users', 'users.id', '=', 'note_sales.id_user')
                ->select('id_note_sale', 'name_client', 'surname_client', 'name', 'date_note', 'state_note', 'total_import_note')
                ->where('id_user', '=', Auth::user()->id)
                ->orderByDesc('id_note_sale')
                ->limit(100)
                ->get();
        }
        return view('notesales.notesales')->with('notesales', $notesales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = DB::table('clients')
            ->select('id_client', 'name_client', 'dni_client', 'surname_client')
            ->get();

        return view('notesales.nventa')->with('clients', $clients);
    }

    public function new(Request $request)
    {
        $notesale = New NoteSale;
        $notesale->id_client = $request->id_client;
        $notesale->id_user = Auth::user()->id;
        $notesale->date_note = date("Y-m-d H:i:s");
        $notesale->state_note = 2;
        $notesale->total_import_note = 0;
        $notesale->type_note_sale = $request->type_note_sale;
        $notesale->save();

        $notesales = DB::table('note_sales')
            ->select('id_note_sale')
            ->where('id_user', Auth::user()->id)
            ->orderByDesc('id_note_sale')
            ->limit(1)
            ->get();

        foreach ($notesales as $notesal) {
            $id = $notesal->id_note_sale;
        }

        $compra = Client::findOrFail($notesale->id_client);
        $compra->buys_client += 1;
        $compra->save();

        return redirect('/notesales/show/'.$id.'1');
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
    public function show($id, $error)
    {
        $notesales = DB::table('note_sales')
            ->join('clients', 'clients.id_client', '=', 'note_sales.id_client')
            ->join('users', 'users.id', '=', 'note_sales.id_user')
            ->select('id_note_sale', 'dni_client', 'name_client', 'surname_client', 'tel_client', 'name', 'date_note', 'state_note', 'total_import_note', 'type_note_sale')
            ->where('id_note_sale', '=', $id)
            ->get();

        foreach ($notesales as $notesale) {
            $val = $notesale->id_note_sale;
            $estado = $notesale->state_note;
            $tipo = $notesale->type_note_sale;
        }

        $notedetail = DB::table('note_details')
            ->join('items', 'items.id_item', '=', 'note_details.id_item')
            ->join('brands', 'brands.id_brand', '=', 'items.id_brand')
            ->select('id_note_detail', 'name_item', 'size_item', 'unit_price_item', 'wholesale_price_item', 'name_brand', 'quantity_note_detail', 'total_price_note_detail')
            ->where('id_note_sale', '=', $id)
            ->orderByDesc('id_note_detail')
            ->get();

        $items = DB::table('items')
            ->join('brands', 'items.id_brand', '=', 'brands.id_brand')
            ->select('items.id_item', 'items.name_item', 'items.size_item', 'brands.name_brand', 'items.stock')
            ->get();

        return view('notesales.show')->with(array('notesales'=>$notesales, 'notedetail'=>$notedetail, 'id'=>$val, 'estado'=>$estado, 'items'=>$items, 'tipo'=>$tipo, 'error'=>$error));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notesale = NoteSale::findOrFail($id);
        $notesale->state_note = $notesale->state_note - 1;
        $notesale->save();
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $notesale = NoteSale::findOrFail($id);
        $notesale->state_note = 0;
        $notesale->save();
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
        $notesale = NoteSale::findOrFail($id);
        $id_client = $notesale->id_client;
        $compra = Client::findOrFail($notesale->id_client);
        $compra->buys_client -= 1;
        $compra->save();

        $notesale = NoteSale::destroy($id);
        return back();
    }
}
