<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\NoteSale;

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
                ->where('id_user', '=', Auth::user()->type_user)
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
    public function create(Request $request, $tipo)
    {
        if ($tipo == 1) {
            return view('notesales.vmenor');
        }elseif ($tipo == 2) {
            return view('notesales.vmayor');
        }
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
        $notesale = NoteSale::findOrFail($id);
        return view('notesales.show')->with('notesale', $notesale);
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
        return redirect('/notesales');
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
