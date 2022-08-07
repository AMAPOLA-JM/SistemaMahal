<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->select('id', 'name', 'surname_user', 'dni_user', 'email', 'type_user', 'state_user')
            ->get();

        return view('settings.settings')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('settings.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->state_user = 0;
        $user->save();
        return redirect('/settings');
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
        $user = User::findOrFail($id);
        return view('settings.edit')->with('user', $user);
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
        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->surname_user = $request->surname_user;
        $user->dni_user = $request->dni_user;
        $user->email = $request->email;
        $request->password = bcrypt($request->password);
        if (auth()->user()->type_user == 0) {
            $user->type_user = $request->type_user;
            if ($request->password != "") {
                $user->password = $request->password;
            }
        }
        $user->save();
        return redirect('/settings');
    }

    public function updatepass(Request $request){
        $pass = auth()->user()->password;
        $error = "";
        if (password_verify($request->actpassword, $pass)) {
            if ($request->password == $request->reppassword) {
                $request->password = bcrypt($request->password);
                $user = User::findOrFail(auth()->user()->id);
                $user->password = $request->password;
                $user->save();
                $error = "Contraseña Cambiada Satisfactoriamente";
                return view('settings.changePass')->with('error', $error);
            }else {
                $error = "No coinciden las contraseñas";
                return view('settings.changePass')->with('error', $error);
            }
        } else {
            $error = "Contraseña actual incorrecta";
            return view('settings.changePass')->with('error', $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::destroy($id);
        return back();
    }


}
