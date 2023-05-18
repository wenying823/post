<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use App\Models\Comments;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $data = Posts::get();
        return view('post', ["posts"=>$data]);
    }
    public function create(Request $request){
        Posts::create([
            'title' => $request->title,
            'comment' => $request->comment
        ]);
        return response()->json(['success'=>'success']);
    }

    public function show($id){
        $post = Posts::where('post_id',$id)
            ->first();
        $messages = Comments::where('post_id',$id)->get();
        return view('comment', ['id'=>$post->post_id,'title'=>$post->title,'comment'=>$post->comment,'messages'=>$messages]);
    }

    public function messageCreate(Request $request, $id){
        Comments::create([
            'messages'=>$request->message,
            'post_id'=>$id
        ]);
        
        $post = Posts::where('post_id',$id)
            ->first();
        $messages = Comments::where('post_id',$id)->get();
        return redirect('/api/post/'.$id);
    }
}
