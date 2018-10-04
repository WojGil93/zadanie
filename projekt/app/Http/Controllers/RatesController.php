<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
   function get_exchanges(){

   		$exchanges = DB::table('exchange_rates')->paginate(10);

   		return view('home', compact('exchanges'));

   }
}
