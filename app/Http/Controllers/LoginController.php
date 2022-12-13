<?php

namespace App\Http\Controllers;

use App\Book;
use App\Note;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;

use App\Traits\LoginTrait;
class LoginController extends Controller
{
    use LoginTrait;




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

        $file_name = $this->saveImage($request->image, 'images');



        $user = new User();
        $user->name = $request->name;
        $user->email  = $request->email ;

        $user->password = Hash::make($request->password);
        $user->image = $file_name;
        $user->terms = $request->terms;
        $user->save();
        return redirect()->back()->with(['success' => __('messages.Added successfully')]);


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

        $file_name = $this->saveImage($request->image, 'images');


        // Update User
        $user->name=$request->name;
        $user->password=$request->password;
        $user->email=$request->email;
        $user->image=$file_name;
        $user->save();
        return redirect('user/create');
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
