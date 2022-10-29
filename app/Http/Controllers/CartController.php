<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\Orders;
use App\Models\Detail_Orders;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function add($id){
        Cart::create([
            
        ]);
    }
}
