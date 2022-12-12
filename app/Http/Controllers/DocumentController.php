<?php
namespace App\Http\Controllers;
use App\Document;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;
class DocumentController extends Controller
{

    public function index(){
        return view('login/document');
    }

    public function saveDocument(Request $request){
        //validate the files
        $this->validate($request,[
            'image' =>'required',
            'image.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName='';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            foreach ($image as $files) {
                $destinationPath = 'public/files/';
                $file_name = time() . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file_name);
                $data[] = $file_name;
                $imageName=$destinationPath.$file_name;
            }
        }
        $file= new Document();
        $file->name=$imageName;
        $file->save();
        return back()->withSuccess('Great! Image has been successfully uploaded.');
    }
}
