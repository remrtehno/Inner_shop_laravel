<?php

namespace App\Http\Controllers\Admin;
use App\Shops;
use App\PaymentShop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $items = PaymentShop::all();
      return view("admin.payments.index",compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $shops = Shops::all();
        return view("admin.payments.create",compact('shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $this->validate($request, [
            'shop_id' =>'required',
            'dollar_rate' =>'required',
            'usd' =>'required',
            'cash' =>'required',
            'terminal' =>'required',
        ]);


        $prod = PaymentShop::add($request->all());

        return redirect()->route('payments-shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\payment_shop  $payment_shop
     * @return \Illuminate\Http\Response
     */
    public function show(payment_shop $payment_shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\payment_shop  $payment_shop
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
    {
        $shops = Shops::all();
        $sl = PaymentShop::find($id);
        return view("admin.payments.edit",compact('sl', 'shops'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\payment_shop  $payment_shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'shop_id' =>'required',
            'dollar_rate' =>'required',
            'usd' =>'required',
            'cash' =>'required',
            'terminal' =>'required',
        ]);

        $post = PaymentShop::find($id);
        $post->edit($request->all());


        return redirect()->route('payments-shop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\payment_shop  $payment_shop
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        $product = PaymentShop::find($id);

        $product->delete();
        return redirect()->route('payments-shop.index');

    }


}
