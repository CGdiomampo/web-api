<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Avatar;
use Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $columns = DB::getSchemaBuilder()->getColumnListing('users');
        $users = DB::table('users')->get();

        //dd($users);
        return view("users.index", ["users"=>$users,"columns"=>$columns]);
       // exit;
        

        //return view('users.index', ['name' => 'Samantha']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('users.create', ['name' => 'Samantha']);
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

        $user = new User([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'lastName' => $request->lastName,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'activation_token' => str_random(60)
        ]);

        $user->save();
        
        $avatar = Avatar::create($user->lastName)->getImageObject()->encode('png');
        Storage::put('avatars/'.$user->id.'/avatar.png', (string) $avatar);

        return redirect()->route('admin.users.index');;
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        //$user = DB::table('users')->first();

        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            $user = User::find($id);

            $user->firstName = $request->firstName;
            $user->lastName = $request->lastName;

            if ( ! $request->password == '')
            {
                $user->password = Hash::make($request->password);
            }

            $user->update();

            return redirect()->route('admin.users.index')->with('status', 'User updated!');

            //exit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {

        $v = User::find(6);
        dd($v);exit;
        $user->delete();
        //return redirect()->route('admin.users.index')->with('status', 'User deleted!');

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
