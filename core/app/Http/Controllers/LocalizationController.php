<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;




class LocalizationController extends Controller
{
    public function index(Request $request, $locale, $full = null)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        session()->put('locale_full', $full);
        return redirect()->back();


    }
}
