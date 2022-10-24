<?php
namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function add(Request $request) {
        return view('user.add');
    }

    public function manage() {
        return view('user.manage');
    }

    public function register(Request $request) {

        $hashed= Hash::make($request->input('password'));
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' =>$request->input('username'),
            'position' => $request->input('position'),
            'password' => $hashed,
        ]);
    
        return view('user.add')->with('message', 'New user created');
    }
    public function edit($id) {

        $user = User::findOrFail($id);
    
        return view('user.edit', compact('user',));
    }
    public function edit_store(Request $request)
    {

        
        $user_id =  User::find($request->user_id);
        $user_id->name  = $request->name;
        $user_id->email  = $request->email;
        $user_id->username  = $request->username;
        $user_id->position = $request->position;
        $user_id->password  = $request->password ;
        $user_id->save();
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function delete($id){
        DB::table('users')->where('id', $id)->delete();
        $users = User::all();
        return view('user.index', compact('users'))->with('message', 'User deleted');
    }
}
