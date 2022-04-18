<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('home');
    }
    public function data(){

        $userData = Post::get();
        return json_encode(array('data'=>$userData));

    }





    public function create(){
        return view('create');
    }


    public function store(Request $request){
        $contact = new Post();
        $contact->name    = $request->name;
        $contact->email   = $request->email;
        $contact->phone   = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        if($contact){
            #Display Success Message in Blade File
            $arr = array('msg' => 'Your query has been submitted Successfully, we will contact you soon!', 'status' => true);
        }
        return Response()->json($arr);
    }



    public function edit($id){

        $post = Post::findOrFail($id);
        return view('edit',compact('post'));
    }
    public function delete($id){

        Post::find($id)->delete($id);



        return response()->json([

            'success' => 'Record deleted successfully!'
        ]);

    }

    public function update(Request $request,$id){

        $post = Post::findOrFail($id);
        $post->name    = $request->name;
        $post->email   = $request->email;
        $post->phone   = $request->phone;
        $post->message = $request->message;
        $post->save();
//        if($post){
//            #Display Success Message in Blade File
//            $arr = array('msg' => 'Your query has been submitted Successfully, we will contact you soon!', 'status' => true);
//        }
//        return Response()->json($arr);
    }



}
