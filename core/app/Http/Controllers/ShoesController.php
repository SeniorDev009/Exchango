<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
use App\Shoe;
use App\ShoePurchase;
use App\ShoeTrx;
use App\Trx;
use App\GeneralSettings;
use File;
use Image;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['page_title'] = 'Manage Shoes';
        if($request->filter == 'physical'){
            $data['shoes'] = Shoe::latest()->where('is_virtual', 0)->paginate(25);

        }else if($request->filter == 'virtual'){
            $data['shoes'] = Shoe::latest()->where('is_virtual', 1)->paginate(25);

        }else{
            $data['shoes'] = Shoe::latest()->paginate(25);
        }
        return view('admin.shoes.index', $data);
    }

    public function showPurchases(Request $request){
        $data['page_title'] = 'Confirm Shoe Purchases';
        if($request->filter == 'pending'){
            $data['shoes_purchases'] = ShoePurchase::latest()->where('status', 'pending')->paginate(25);

        }else if($request->filter == 'confirmed'){
            $data['shoes_purchases'] = ShoePurchase::latest()->where('status', 'confirmed')->paginate(25);

        }else{
            $data['shoes_purchases'] = ShoePurchase::latest()->paginate(25);
        }
        return view('admin.shoes.purchases', $data);
    }

    public function showLog(Request $request){

        $data['page_title'] = 'Shoe Exchange Logs';

        if($request->filter == 'sell'){
            $data['shoe_logs'] = ShoeTrx::latest()->where('type', 'sell')->paginate(25);

        }else if($request->filter == 'buy'){
            $data['shoe_logs'] = ShoeTrx::latest()->where('type', 'buy')->paginate(25);

        }else{
            $data['shoe_logs'] = ShoeTrx::latest()->paginate(25);
        }
        return view('admin.shoes.log', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Manage Shoes';
        return view('admin.shoes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:0|max:255',
            'description' => 'sometimes|min:0|max:255',
            'sell_price' => 'sometimes|numeric|min:0',
            'purchase_price' => 'required|numeric|min:0',
            'total_items' => 'required|numeric|min:0',
            'discount' => 'sometimes|numeric|max:100|min:0',
            'discount_expiry' => 'sometimes',
            'image' => 'sometimes|mimes:png,jpg,jpeg',
        ]);

        $in = Input::except('_method', '_token');
        $in['is_virtual'] = $request->is_virtual == "on" ? 1 : 0;
        $in['status'] = $request->status == "on" ? 1 : 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = str_slug($request->name) . '_' . time() . '.'.$image->getClientOriginalExtension();;
            $location = 'assets/images/shoes/' . $filename;
            Image::make($image)->resize(380, 260)->save($location);
            $in['image'] = $filename;
        }
        Shoe::create($in);
        return back()->with('success', 'Save Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shoe $shoe)
    {
        $data['shoe'] = $shoe;
        $data['page_title'] = "Edit Shoes";
        return view('admin.shoes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shoe $shoe)
    {
        $request->validate([
            'name' => 'required|min:0|max:255',
            'description' => 'sometimes|min:0|max:255',
            'sell_price' => 'sometimes|numeric|min:0',
            'purchase_price' => 'required|numeric|min:0',
            'total_items' => 'required|numeric|min:0',
            'discount' => 'sometimes|numeric|max:100|min:0',
            'discount_expiry' => 'sometimes',
            'image' => 'sometimes|mimes:png,jpg,jpeg',
        ]);

        $in = Input::except('_method', '_token');
        $in['is_virtual'] = $request->is_virtual == "on" ? 1 : 0;
        $in['status'] = $request->status == "on" ? 1 : 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = str_slug($request->name).'_' . time() .'.'. $image->getClientOriginalExtension();
            $location = 'assets/images/shoes/' . $filename;
            Image::make($image)->resize(380, 260)->save($location);
            $path = './assets/images/shoes/';
            File::delete($path . $shoe->image);
            $in['image'] = $filename;
        }
        $shoe->fill($in)->save();

        return back()->with('success', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function purchase($id, Request $request){

        $gnl = GeneralSettings::first();

        $shoe = Shoe::find($id);

        if( ! (Carbon::now()->startOfDay()->diffInDays(Carbon::parse($shoe->discount_expiry)->startOfDay() , false ) < 0) ){
            $discount = round($shoe->purchase_price * ($shoe->discount/100));
        }else{
            $discount = 0;
        }

        $purchase_price = $shoe->purchase_price - $discount;

        $user = auth()->user();

        if( $user->balance < $purchase_price ){
            return back()->with('alert', 'Account balance low!, please recharge and try again!');
        }else if( $shoe->total_items <= 0 ){
            return back()->with('alert', 'Stock Empty!');
        }else{

            ShoePurchase::create([
                'user_id' => $user->id,
                'shoe_id' => $shoe->id,
                'total_amount' => $purchase_price,
                'status' => 'pending',
                'discount' => $discount,
            ]);

            return back()->with('success', "Purchase order placed successfully!, awaiting confirmation! ");

        }
    }


    public function confirmPurchase($id, Request $request){

        $gnl = GeneralSettings::first();

        $shoes_purchases = ShoePurchase::find($id);
        $shoe = Shoe::find($shoes_purchases->shoe_id);
        $purchase_price = $shoes_purchases->total_amount;

        $user = $shoes_purchases->user;
        if( $user->balance < $purchase_price ){
            return back()->with('alert', 'User account balance low!');
        }else if( $shoe->total_items <= 0 ){
            return back()->with('alert', 'Stock Empty!');
        }else{

            $user->balance = $user->balance - $purchase_price;
            $user->save();

            $shoe->total_items = $shoe->total_items - 1;
            $shoe->save();

            $trx_id = Trx::create([
                'user_id' => $user->id,
                'amount' => round($purchase_price),
                'main_amo' => round($user->balance,$gnl->decimal),
                'charge' => 0,
                'type' => '-',
                'currency_id' => 964,
                'title' => 'Purchase of a pyhsical shoe!',
                'trx' => str_random(16)
            ]);

            ShoePurchase::where('id', $id )->update(['trx_id'=> $trx_id->id, 'status' => 'confirmed']);

            return back()->with('success', "Purchase confirmed successfully!");

        }
    }

    public function virtualPurchase($id){
        
        $gnl = GeneralSettings::first();

        $shoe = Shoe::find($id);
        if( ! (Carbon::now()->startOfDay()->diffInDays(Carbon::parse($shoe->discount_expiry)->startOfDay() , false ) < 0) ){
            $discount = round($shoe->purchase_price * ($shoe->discount/100));
        }else{
            $discount = 0;
        }

        $purchase_price = $shoe->purchase_price - $discount;

        $user = auth()->user();

        if( $user->balance < $purchase_price ){
            return back()->with('alert', 'Account balance low!, please recharge and try again!');
        }else if( $shoe->total_items <= 0 ){
            return back()->with('alert', 'Stock Empty!');
        }else{

            $user->balance = $user->balance - round($purchase_price);
            $user->save();

            $shoe->total_items = $shoe->total_items - 1;
            $shoe->save();

            $trx_id = Trx::create([
                'user_id' => $user->id,
                'amount' => round($purchase_price),
                'main_amo' => round($user->balance,$gnl->decimal),
                'charge' => 0,
                'type' => '-',
                'currency_id' => 964,
                'title' => 'Purchase of a virtual shoe.',
                'trx' => str_random(16)
            ]);

            ShoeTrx::create([
                'user_id' => $user->id,
                'shoe_id' => $shoe->id,
                'total_amount' => round($purchase_price),
                'type' => 'buy',
                'discount' => $discount,
            ]);

            return back()->with('success', "Shoe purchased successfully at ". $purchase_price . " " . $gnl->currency .". The same amount has been deducted from your account!" );

        }
    }

    public function virtualSell($id){
        
        $gnl = GeneralSettings::first();

        $shoe = Shoe::find($id);
        $shoe_trxs = ShoeTrx::latest()->where('user_id', auth()->user()->id)->where('shoe_id', $id)->get()->groupby(['type']);

        // dd($shoe_trxs);
        if(( array_key_exists( 'buy' , $shoe_trxs->toArray() ) ? $shoe_trxs['buy']->count() : 0 ) -  ( array_key_exists('sell', $shoe_trxs->toArray() ) ? $shoe_trxs['sell']->count() : 0 ) <= 0 ){
            return back()->with('alert', "You don't own this shoe, please purchase from the home page!");
        }

        $sell_price = $shoe->sell_price;

        $user = auth()->user();

        $user->balance = $user->balance + round($sell_price);
        $user->save();

        $shoe->total_items = $shoe->total_items + 1;
        $shoe->save();

        $trx_id = Trx::create([
            'user_id' => $user->id,
            'amount' => round($sell_price),
            'main_amo' => round($user->balance,$gnl->decimal),
            'charge' => 0,
            'type' => '+',
            'currency_id' => 964,
            'title' => 'Sale of a virtual shoe.',
            'trx' => str_random(16)
        ]);

        ShoeTrx::create([
            'user_id' => $user->id,
            'shoe_id' => $shoe->id,
            'total_amount' => round($sell_price),
            'type' => 'sell',
        ]);

        return back()->with('success', " Shoe successfully sold at ". $sell_price . " " . $gnl->currency .". The amount has been added into you account!");

    }

}
