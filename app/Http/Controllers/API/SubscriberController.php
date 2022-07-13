<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\SubscriberResource;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Validator;
class SubscriberController extends BaseController
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
            'subscriber_name'=>'required',
            'email'=>'required|email|unique:subscribers',
            'address'=>'required',
            'website_id'=>'required|numeric'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $subscriber = Subscriber::create($input);
        return $this->sendResponse(new SubscriberResource($subscriber), 'Subscriber created successfully.');
    }
}
