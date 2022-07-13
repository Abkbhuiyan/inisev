<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class SubscriberController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'subscriber_name'=>'required',
            'email'=>'required|email|unique:subscribers',
            'address'=>'required',
            'website_id'=>'required|numeric',

        ]);
    }
}
