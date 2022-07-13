<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\PostResource;
use App\Jobs\SendEmailJob;
use App\Mail\PostMail;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Validator;

class PostController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'post_title'=>'required',
            'author'=>'',
            'description'=>'required',
            'website_id'=>'required|numeric'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $post = Post::create($input);
        $subscribers = Subscriber::where('website_id','=',$post->website_id)->get();
        $email = new PostMail($post);
        foreach ($subscribers as $subscriber){
            $details['email'] = $subscriber->email;
            dispatch(new SendEmailJob($details,$email));
        }
        return $this->sendResponse(new PostResource($post), 'Post created successfully.');
    }
}
