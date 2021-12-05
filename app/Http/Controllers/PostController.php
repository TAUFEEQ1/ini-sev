<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Wesbites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Jobs\SendPost;
class PostController extends Controller
{
    //
    public function publish(Request $request){
    
        $validation = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:255',
                'description' => 'required',
                'website_id'=>'required'
            ]
        );

        if ($validation->fails()) {
            return response()->json($validation->getMessageBag()->all(),422);
        }

        $data = $request->all();
        $website = Wesbites::findOrFail($data["website_id"]);
        $post = new Post;
        $post->title = $data["title"];
        $post->description = $data["description"];
        $post->website_id = $website->id;
        $post->save();
        SendPost::dispatch($post);
        return response("Post saved successfully");
    }
}
