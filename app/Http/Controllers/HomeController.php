<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = date("Y").'-'.date("m").'-01';
        $user = Auth::user()->id;
        $notesales = DB::table('note_sales')
            ->select(DB::raw('count(*) as ventas'))
            ->where('id_user', '=', $user)
            ->where('date_note', '>=', $date)
            ->get();
        return view('home')->with('notesales', $notesales);
    }
}
