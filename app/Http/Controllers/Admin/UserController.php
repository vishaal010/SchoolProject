<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $role = DB::table('users')
//        ->select('name')
//        ->join('roles', 'role_user.role_id', '=', 'roles.id')
//        ->join('users', 'role_user.user_id', '=' ,'users.id')
//        ->toSql();
//
//        $users->first()->name;
//        $users->first()->roles->first()->name;


        $users = User::with('roles')->paginate(10);


        if (Gate::denies('logged-in')){

        }

        if(Gate::allows('is-admin')){
           return view('admin.users.index',['users' => $users]);
        }

        dd('je moet admin zijn');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
//        $validatedData = $request->validated();
//
//        $user = User::create($validatedData);

        $newUser = new CreateNewUser();

        $user = $newUser->create($request->only(['name', 'email', 'password', 'password_confirmation']));

        $user->roles()->sync($request->roles);

        Password::sendResetLink($request->only(['email']));

        $request->session()->flash('success', 'Gebruiker is aangemaakt');


        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = DB::table('users')
            ->select('name')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->join('users', 'role_user.user_id', '=' ,'users.id')
            ->toSql();


        if(Gate::allows('is-admin')){
            return view('admin.users.index',['role' => $role]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit',
            [
                'roles' => Role::all(),
                'user' => User::find($id)
            ]);

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
        $user = User::findorFail($id);

        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);

        $request->session()->flash('success', 'Gebruiker is bewerkt');


        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::destroy($id);
        $request->session()->flash('success', 'Gebruiker is verwijderd');

        return redirect(route('admin.users.index'));
    }

    /**
     * To Update Status of User
     * @param Integer $user_id
     * @param Integer $status_code
     * @return Success Response.
     */

    public function updateStatus($user_id, $status_code)
    {
        try {
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);

            if ($update_user){
                return redirect()->route('admin.users.index')->with('succes', 'Gelukt');
            }
            return redirect()->route('admin.users.index')->with('error', 'Gefaald');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
