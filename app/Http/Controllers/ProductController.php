<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::orderby('id' , 'desc')->get();
        return view('product.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Product::create($input);
        return redirect('product'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product,$id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $product = Product::find($id);
        return view('product.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $product = Product::find($id);
    //     $input = $request->all();
    //     $product->save($input);
    //     return redirect('product')->with('flash_message', 'product Updated!');  
    // }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $input = $request->all();
        $product->update($input);
        return redirect('product');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('product');  
    }

    public function product(){
        return view('product');
    }


    public function addToCart(Request $request){
        $id= $request->has('pid')? $request->get('pid'): '';
        $name= $request->has('name')? $request->get('name'): '';
        $quantity= $request->has('quantity')? $request->get('quantity'): '';
        
        $price= $request->has('price')? $request->get('price'): '';

        
        $cart= Cart::content()->where('id', $id)->first();

        if(isset($cart)&& $cart!=null){
            $quantity= ((int)$quantity + (int)$cart->qty);
            $total= ((int)$quantity * (int)$price);
            Cart::update($cart->rowId, ['qty'=>$quantity, 'options'=> ['total'=> $total]]);
        } else{
            $total= ((int)$quantity * (int)$price);
            Cart::add($id, $name, $quantity, $price, ['total'=> $total]);
        }

        return redirect('/product')->with('success', 'Product Added to Your Cart!');
    }



    public function viewCart(){

        $carts = Cart::content();
        $subTotal = Cart::subtotal();

        return view('cart',compact('carts' , 'subTotal'));
        
    }

    public function removeCartItem($rowId){

        Cart::remove($rowId);
        return redirect('cart')->with('success', 'Cart item Removed Succesfully!');
    }
}
