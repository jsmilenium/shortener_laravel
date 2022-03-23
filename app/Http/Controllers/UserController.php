<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Junges\ACL\Http\Models\Group;
use App\Models\Lojas;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
        $this->middleware('groups:administrador');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('seguranca.usuarios.index', compact('users'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::get();
        $lojas = Lojas::get();
        return view('seguranca.usuarios.create', compact('groups', 'lojas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        try {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->loja_id = $request->loja_id;
            $user->save();
            $user->assignGroup($request->group);


            return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', $th);
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
        if (User::find($id)) {
            return view('seguranca.usuarios.edit', [
                'user' => User::find($id),
                'groups' => Group::get(),
                'lojas' => Lojas::get()
            ]);
        }
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
        try {

            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->loja_id = $request->loja_id;
            if($request->password){
                $user->password = bcrypt($request->password);
            }
            $user->save();
            $user->revokeAllGroups();
            $user->assignGroup($request->group);

            return redirect()->route('users.index')->with('success', 'Usuário alterado com sucesso!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('error', $th);
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
        if (User::find($id)) {
            User::find($id)->delete();

            return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Usuário não encontrado!');
        }
    }
}
