<?php

namespace App\Http\Controllers;

use App\Book;
use App\Note;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;

//use App\Traits\LoginTrait;
class LoginController extends Controller
{
//    use LoginTrait;

    function index(){
        return view('navView');


    }


    function show($id)
    {

        $user=User::findorfail($id);

        return view('login/showUserView',[
            'user'=>$user
        ]);

    }

    public function showAll()
    {
        $users = User::get();

        return view('login.ShowUserAll', [
            'users' => $users
        ]);
    }


    public function create()
    {
        return view('login.create');
    }

    public function store(LoginRequest $request)
    {
        $imageName="";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'route_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $imageName='images/'.$name;
        }

        $user = new User();
        $user->name = $request->name;
        $user->email  = $request->email ;

        $user->password = Hash::make($request->password);
        $user->image = $imageName;
        $user->terms = $request->terms;
        $user->save();
        return back();


    }


    function edit($id)
    {
        $user = User::findorfail($id);

        return view('login.edit', [
            'user' => $user
        ]);
    }

    function update(LoginRequest $request, $id)
    {
        $user=User::findorfail($id);

        $imageName=$user->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'route_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $imageName='images/'.$name;
        }

        // Update User
        $user->name=$request->name;
        $user->password=$request->password;
        $user->email=$request->email;
        $user->image=$imageName;
        $user->save();
        return redirect('login/create');
    }


    public function destroy($id)
    {
        $user=User::findorfail($id);
        $user->delete();

        return back();
    }




    function notes(){
        return view('Users/notes');
    }

    function handlenotes(Request $request){

        // note model
        $note=New Note();
        $note->content=$request->link;
        $note->link_id=Auth::user()->id;
        $note->save();


        return redirect('users/notes');
    }

}
