<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\SubscriberWesbites;
use App\Models\Wesbites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    //
    public function subscribe(Request $request){
        $validation = Validator::make(
            $request->all(),
            [
                'website_id' => 'required',
                'email' => 'required',
            ]
        );
        if($validation->fails()){
            return response()->json($validation->getMessageBag()->all(),422);
        }
        $website_id = $request->input("website_id");
        $email = $request->input("email");

        $subscriber = Subscriber::firstOrNew(['email'=>$email]);
        $subscriber->email = $email;
        $subscriber->save();

        $website = Wesbites::findOrFail($website_id);
        
        $subw = new SubscriberWesbites;
        $subw->website_id = $website->id;
        $subw->subscriber_id = $subscriber->id;

        $subw->save();

        return response("User Subscribed successfully");
    }
}
