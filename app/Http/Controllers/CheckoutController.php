<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Mail;
use App\Mail\OrderDetails;

class CheckoutController extends Controller
{

    
    public function index(){

        $emailId = auth()->user()->email; 
        Mail::to($emailId)->send(new OrderDetails);
        Cart::clear();
        return view('thanks');
    }
}

