<?php

namespace App\Http\Controllers;

use App\BuyMoney;
use App\Category;
use App\Continent;
use App\Country;
use App\Currency;
use App\ExchangeMoney;
use App\Faq;
use App\GeneralSettings;
use App\Mentor;
use App\Menu;
use App\Post;
use App\SellMoney;
use App\Service;
use App\Subscriber;
use App\Testimonial;
use App\AppCountry;
use Illuminate\Http\Request;
use Exception;
use App\User;
use DB;
use App\Trx;
use App\Shoe;
use App\Gateway;

class FrontendController extends Controller
{
    public function __construct()
    {
        // $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        // $parameters = [
        //     'start' => '1',
        //     'limit' => '500',
        //     'convert' => 'USD'
        // ];

        // $headers = [
        //     'Accepts: application/json',
        //     'X-CMC_PRO_API_KEY: b5926e63-f3d7-4480-9c18-c174cc0d71d2'
        // ];
        // $qs = http_build_query($parameters); // query string encode the parameters
        // $request = "{$url}?{$qs}"; // create the request URL


        // $curl = curl_init(); // Get cURL resource
        // // Set cURL options
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => $request,            // set the request URL
        //     CURLOPT_HTTPHEADER => $headers,     // set the headers 
        //     CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        // ));

        // $response = curl_exec($curl); // Send the request, save the response
        // // print_r(json_decode($response)); // print json decoded response
        // $json_data = json_decode($response);
        // // echo ($json_data->data[3]->name);
        // $items = $json_data->data;

        // foreach ($items as $item) {
        //     // echo ($item->id . "-" . $item->name . "-" . $item->symbol . "-" . $item->quote->USD->price . "\n");
            
        //     // $coin['price'] = round($raw['PRICE']['PRICE'], 8);
        //     // $coin->save();

        //     Currency::create([
        //         'coinid' => $item->id,
        //         'name' => $item->name,
        //         'symbol' => $item->symbol,
        //         'price' => $item->quote->USD->price,
                
        //     ]);

        //     // $coin->save();

        // }
        
        // curl_close($curl); // Close request
    }
    public function index()
    {
        $data['page_title'] = "Home";
        // $data['currency'] = Currency::whereStatus(1)->orderBy('symbol','asc')->get();
        // $data['currency2'] = Currency::whereStatus(1)->orderBy('symbol','desc')->get();
        // $data['testimonial'] = Testimonial::all();
        // $data['service'] = Service::all();
        // $data['exchange'] = ExchangeMoney::where('status',2)->latest()->take(10)->get();
        // $data['sellMoney'] = SellMoney::where('status',2)->latest()->take(10)->get();
        // $data['buyMoney'] = BuyMoney::where('status',2)->latest()->take(10)->get();
        // $data['service'] = Service::all();
        $data['virtual_shoes'] = Shoe::latest()->where(['is_virtual' => 1, 'status' => 1])->where('total_items', '>' , 0 )->get();
        $data['currencies'] = Currency::latest()->where('status', 1)->take(4)->get();
        $data['gate'] = Gateway::find(502);
        $data['physical_shoes'] = Shoe::latest()->where(['is_virtual' => 0, 'status' => 1])->where('total_items', '>' , 0 )->get();
        return view('front.home1', $data);
    }

    public function spin(){

        $data = array ( 
            array( 
                "label"=>"1x", "value"=>1, "question"=>"Congratulation! You've earned 100 points!",
                "picked"=> 0, "pieslice"=> 240, "rotation" => 0 + 360 * 30, "ps" => 60, "rng" => 1096
            ), 
            array( 
                "label"=>"Lose", "value"=>1, "question"=>"Bad Luck! Try again!",
                "picked"=> 1, "pieslice"=> 240, "rotation" => 300 + 360 * 30, "ps" => 60, "rng" => 0
            ), 
            array( 
                "label"=>"Lose", "value"=>1, "question"=>"Bad Luck! Try again!",
                "picked"=> 2, "pieslice"=> 240, "rotation" => 240 + 360 * 30, "ps" => 60, "rng" => 972
            ),
            array( 
                "label"=>"1K", "value"=>1, "question"=>"Congratulation! You've earned 1000 points!",
                "picked"=> 3, "pieslice"=> 5965, "rotation" => 180 + 360 * 30, "ps" => 60, "rng" => 1096
            ),
            array( 
                "label"=>"Lose", "value"=>1, "question"=>"Bad Luck! Try again!",
                "picked"=> 4, "pieslice"=> 240, "rotation" => 150 + 360 * 30, "ps" => 13800, "rng" => 60
            ), 
            array( 
                "label"=>"Lose", "value"=>1, "question"=>"Bad Luck! Try again!",
                "picked"=> 5, "pieslice"=> 5965, "rotation" => 60 + 360 * 30, "ps" => 60, "rng" => 1096
            ), 
        ); 
        $data = json_decode(json_encode($data));
        $gnl = GeneralSettings::first();
        $user = auth()->user();

        $dco_balance =   Trx::where('user_id', $user->id)->where('type', '+')->where('currency_id', 964)->sum('amount')
                        -Trx::where('user_id', $user->id)->where('type', '-')->where('currency_id', 964)->sum('amount');

        if($dco_balance < 100){
            return back()->with("alert", "Insufficient Demo Coins(DCO) in your account to spin!");
        }else if($dco_balance > 100) {

            try{
                // $check_in_loop = [];
                // for ($i=0; $i < 100; $i++) { 
                //     $picked = getRandomWeightedElement( array( "0"=> 8, "1"=> 23, "2" => 23, "3" => 0, "4" => 23, "5" => 23 ) );
                //     array_push($check_in_loop, $picked);
                // }

                /* Getting an element by weighted average */
                $picked = getRandomWeightedElement( array( "0"=> 8, "1"=> 23, "2" => 23, "3" => 0, "4" => 23, "5" => 23 ) );
                if($picked == 0){
                    try{
                         /*Atomic*/
                        // User::query()
                        //     ->where('id', $user->id)
                        //     ->update([
                        //     '   balance' => DB::raw('balance + 100')
                        //     ]);
                        $user->balance = $user->balance + 100;
                        $user->save();

                        Trx::create([
                            'user_id' => $user->id,
                            'amount' => 100,
                            'main_amo' => round($user->balance,$gnl->decimal),
                            'charge' => 0,
                            'type' => '+',
                            'currency_id' => 964,
                            'title' => 'Spin profits' ,
                            'trx' => str_random(16)
                        ]);
                    }catch(Exception $e){
                        return $e;
                    }
                }else if($picked == 3){
                    try{
                        /*Atomic*/
                        // User::query()
                        //     ->where('id', $user->id)
                        //     ->update([
                        //     '   balance' => DB::raw('balance + 1000')
                        //     ]);
                        $user->balance = $user->balance + 1000;
                        $user->save();

                        Trx::create([
                            'user_id' => $user->id,
                            'amount' => 1000,
                            'main_amo' => round($user->balance,$gnl->decimal),
                            'charge' => 0,
                            'type' => '+',
                            'currency_id' => 964,
                            'title' => 'Spin Profits' ,
                            'trx' => str_random(16)
                        ]);
                    }catch(Exception $e){
                        return $e;
                    }
                }else{
                    try{
                        /*Atomic*/
                        // User::query()
                        //     ->where('id', $user->id)
                        //     ->update([
                        //     '   balance' => DB::raw('balance - 100')
                        //     ]);
                        $user->balance = $user->balance - 100;
                        $user->save();

                        Trx::create([
                            'user_id' => $user->id,
                            'amount' => 100,
                            'main_amo' => round($user->balance,$gnl->decimal),
                            'charge' => 0,
                            'type' => '-',
                            'currency_id' => 964,
                            'title' => 'Spin Losses' ,
                            'trx' => str_random(16)
                        ]);
                    }catch(Exception $e){
                        return $e;
                    }
                }

            } catch(Exception $e){
                return response()->json(['error'=> $e]);
            }
            return response()->json(['success'=> array( "picked" =>  $data[$picked]->picked,
                                                        "pieslice" =>  $data[$picked]->pieslice, 
                                                        "rng" =>  $data[$picked]->rng, 
                                                        "rotation" =>  $data[$picked]->rotation, 
                                                        "ps" =>  $data[$picked]->ps,
                                                        "question" => $data[$picked]->question
                                                        )
                                    ]);
        }else{
            return back()->with("alert", "Unkown error occured!!");
        }
    }

    public function exchange()
    {
        $data['page_title'] = "Home";
        $data['currency'] = Currency::whereStatus(1)->orderBy('symbol','asc')->get();
        $data['currency2'] = Currency::whereStatus(1)->orderBy('symbol','desc')->get();
        $data['testimonial'] = Testimonial::all();
        $data['service'] = Service::all();
        $data['exchange'] = ExchangeMoney::where('status',2)->latest()->take(10)->get();
        $data['sellMoney'] = SellMoney::where('status',2)->latest()->take(10)->get();
        $data['buyMoney'] = BuyMoney::where('status',2)->latest()->take(10)->get();
        $data['service'] = Service::all();
        return view('front.home', $data);
    }

    public function blog()
    {
        $data['page_title'] = "Blogs";
        $data['blogs'] = Post::where('status', 1)->latest()->paginate(3);
        return view('front.blog', $data);
    }

    public function categoryByBlog($id)
    {
        $cat = Category::find($id);
        $data['page_title'] = "$cat->name";
        $data['blogs'] = $cat->posts()->latest()->paginate(3);
        return view('front.blog', $data);
    }

    public function details($id)
    {
        $post = Post::find($id);
        if ($post) {
            $data['page_title'] = "Blog Details";
            $data['post'] = $post;
            return view('front.details', $data);
        }
        abort(404);
    }

    public function faqs()
    {
        $data['page_title'] = "Faq";
        $data['faqs'] = Faq::all();
        return view('front.faq', $data);
    }
    public function termsCondition()
    {
        $data['page_title'] = "Terms & Condition";

        return view('front.terms', $data);
    }
    public function privacyPolicy()
    {
        $data['page_title'] = "Privacy & Policy";
        return view('front.policy', $data);
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);
        $macCount = Subscriber::where('email', $request->email)->count();
        if ($macCount > 0) {
            return back()->with('alert', 'This Email Already Exist !!');
        } else {
            Subscriber::create($request->all());
            return back()->with('success', ' Subscribe Successfully!');
        }
    }

    public function contactUs()
    {
        $data['page_title'] = "Contact Us";
        return view('front.contact', $data);
    }

    public function contactSubmit(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'subject' => 'required',
            'phone' => 'required',
        ]);
        $subject = $request->subject;
        $phone = "<br><br>" . "Contact Number : " . $request->phone . "<br><br>";

        $txt = $request->message . $phone;

        send_contact($request->email, $request->name, $subject, $txt);
        return back()->with('success', ' Contact Message Send Successfully!');
    }

    public function about()
    {
        $data['page_title'] = "About Us";
        $data['service'] = Service::all();
        return view('front.about', $data);
    }

    public function service($id)
    {
        $service = Service::find($id);
        if ($service) {
            $get['data'] = $service;
            $get['page_title'] = "Service";
            return view('front.service-info', $get);
        }
        abort(404);
    }

    public function menu($id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            $data['page_title'] = $menu->name;
            $data['menu'] = $menu;
            return view('front.menu', $data);
        }
        abort(404);
    }

    public function buy()
    {
        $get['currency'] = Currency::whereStatus(1)->orderBy('name','asc')->get();
        $get['page_title'] = " Buy Currency";
        return view('front.buy', $get);
    }
    public function sell()
    {
        $get['page_title'] = "Sell Currency";
        $get['currency'] = Currency::whereStatus(1)->orderBy('name','asc')->get();
        return view('front.sell', $get);
    }

    public function register($reference)
    {
        $page_title = "Sign Up";
        $data['page_title'] = "Sign Up";
        $data['countries'] = AppCountry::pluck('country_name')->all();
        $countries = $data['countries'];
        return view('auth.register',compact('reference','page_title', 'countries'));
    }




    public function cronPrice()
    {
        $coins = Currency::where('is_coin', 1)->where('status',1)->get();


        foreach ($coins as $coin) {

            $a = @file_get_contents("https://min-api.cryptocompare.com/data/pricemultifull?fsyms=USD&tsyms=$coin->symbol");

            if ($a){
                $b = json_decode($a, true);

                if (!isset($b['RAW']['USD']["$coin->symbol"]))
                {
                    continue;
                }else{
                    $raw['PRICE'] = $b['RAW']['USD']["$coin->symbol"];
                    $coin['price'] = round($raw['PRICE']['PRICE'], 8);
                    $coin->save();
                }
            }
            continue;

        }
    }


}
