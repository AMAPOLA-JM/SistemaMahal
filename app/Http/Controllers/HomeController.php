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

        $datetoday = date("Y-m-d");
        $notetodays = DB::table('note_sales')
            ->select(DB::raw('count(*) as ventas'))
            ->where('id_user', '=', $user)
            ->where('date_note', '>=', $datetoday)
            ->get();

        $cajamonth = DB::table('note_sales')
            ->select(DB::raw('SUM(total_import_note) as total_month'))
            ->where('id_user', '=', $user)
            ->where('date_note', '>=', $date)
            ->get();

        $cajaday = DB::table('note_sales')
            ->select(DB::raw('SUM(total_import_note) as total_day'))
            ->where('id_user', '=', $user)
            ->where('date_note', '>=', $datetoday)
            ->get();

        $mostselles = DB::table('note_sales')
            ->join('note_details', 'note_sales.id_note_sale', '=', 'note_details.id_note_sale')
            ->join('items', 'note_details.id_item', '=', 'items.id_item')
            ->join('brands', 'items.id_brand', '=', 'brands.id_brand')
            ->select('note_details.id_item', 'name_brand', 'items.name_item', 'items.size_item', DB::raw('SUM(note_details.quantity_note_detail) as compras'))
            ->where('note_sales.date_note', '>', $date)
            ->groupBy('name_brand', 'name_item', 'id_item', 'size_item')
            ->orderByDesc('compras')
            ->limit(5)
            ->get();

        $lowstock = DB::table('items')
            ->join('brands', 'items.id_brand', '=', 'brands.id_brand')
            ->select('id_item', 'name_brand', 'name_item', 'size_item', 'stock')
            ->orderBy('stock')
            ->limit(5)
            ->get();

        return view('home')->with(array('notesales'=>$notesales, 'notetodays'=>$notetodays, 'cajamonth'=>$cajamonth, 'cajaday'=>$cajaday, 'mostselles'=>$mostselles, 'lowstock'=>$lowstock));
    }
}
