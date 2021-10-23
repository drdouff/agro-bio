<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //

    public function home(){
        return view('client.home');
    }

    public function shop(){
        return view('client.shop');
    }

    public function pagne(){
        return view('client.cart');
    }

    public function client_login(){
        return view('client.login');
    }

    public function inscription(){
        return view('client.inscription');
    }
    public function checkout(){
        return view('client.checkout');
    }
}
