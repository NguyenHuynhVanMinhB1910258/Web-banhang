<?php

namespace App\Http\Controllers;
use App\Models\products;
use App\Models\Orders;
use App\Models\Detail_Orders;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function removecart($id){
        Detail_Orders::where(['id'=>$id])->delete();
        $orders=Orders::where(['id_user'=>session('user_id'),
                                'Status'=>'-1'])->withCount('items')->get();
        foreach( $orders as $order){}      
        Session::put('cart',$order->items_count);
        return response($order->items_count);
    }
    public function add($id){
        $orders=Orders::where(['id_user'=>session('user_id'),
                                'Status'=>'-1'])->get();
        $products=products::where(['id'=>$id])->get();
        foreach( $orders as $order){}      
        foreach( $products as $product){}
        if(session('user')){
            if($orders->toArray()==null){
                $neworder = Orders::create(['id_user'=>session('user_id'),
                'Status'=>'-1']);
                $newitems = Detail_Orders::create(['id_product' => $id, 'id_order' => $neworder->id]);
                $item_quantity = Orders::where(['id'=>$neworder->id])->withCount('items')->get();
            }else{
                $newitems = Detail_Orders::create(['id_product' => $id, 'id_order' => $order->id]);
                $item_quantity = Orders::where(['id'=>$order->id])->withCount('items')->get();
            }
        }
        foreach($item_quantity as  $quantity){}
        Session::put('cart',$quantity->items_count);
        return response()->json($quantity->items_count);
    }
    public function showcart(){
        $orders=Orders::where(['id_user'=>session('user_id'),
                                'Status'=>'-1'])->get();
        foreach($orders as $order){}
        $output="";
        $products=Detail_Orders::where(['id_order'=>$order->id])->get();
        $i=0;
        $total = 0;
        foreach($products as $product){
            $id=$product->id;
            $id_product=$product->products['id'];
            $poster = $product->products['poster'];
            $name = $product->products['name'];
            $price = $product->products['price'];
            $total = $total + $price;
            if($i<=9){
                if($output === ""){ 
                    // href='detail-$id_product'
            $output =  "<div class='dropdown-item d-flex align-items-center'>
                                       <div class='dropdown-list-image mr-3'>
                                            <img  src='backend/img/$poster'
                                                alt='...'>
                                        </div>
                                        
                                        <div class='row font-weight-bold'>
                                            <div class='col-10' >
                                               <a href='detail-$id_product' style='text-decoration: none;' > 
                                                <div class='text-truncate'>$name</div>
                                                <div class='small text-gray-500'>$price</div> 
                                                </a>   
                                            </div>
                                        
                                            <a class='col-2' onclick='removeitem($id)'><i class=' fa fa-times' aria-hidden='true' ></i></a>
                                        </div>
                                        
                        </div>";
            }else{
                $output .= "<div class='dropdown-item d-flex align-items-center'>
                                <div class='dropdown-list-image mr-3'>
                                    <img  src='backend/img/$poster'
                                        alt='...'>
                                </div>
                                <div class='row font-weight-bold'>
                                    <div class='col-10' >
                                        <a href='detail-$id_product' style='text-decoration: none;' > 
                                        <div class='text-truncate'>$name</div>
                                        <div class='small text-gray-500'>$price</div>
                                        </a>     
                                    </div>
                                    <a class='col-2' onclick='removeitem($id)'><i class=' fa fa-times' aria-hidden='true' ></i></a>
                                </div>
                            </div>";
                } 
            $i++;
            }
           
        }
        

            if($output==""){
                $output = "<div class='dropdown-item d-flex align-items-center'>
                                    <div class='col-12' style='height: 300px' >
                                        
                                            Không có sản phẩm trong giỏ
                                        
                                    </div>
                            </div>";
            }else{
                $output .= "<div class='dropdown-item align-items-center'>
                    <div class='row font-weight-bold'>
                        
                            <div class='col-8'>Total:</div>
                            <div class='col-4'>$$total</div>    
                        
                    </div>
                </div>
                <a class='dropdown-item text-center small text-gray-1000' href='#'>view cart details</a>
                <a class='dropdown-item text-center text-white' href='#' style='background-color: #4e73df;'>buy now</a>
                ";
            }
            return response($output);
        // return dd($product->products['poster']);
    }
}