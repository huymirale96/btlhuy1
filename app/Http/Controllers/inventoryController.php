<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;


class inventoryController extends Controller
{
    //
      public function __construct()
    {

    }
    public function inventory()
    {
    	return view('inventory.inventory');
    }
    public function getProduct()
    {
    	//$data = Product::All()->toJson();
    	//$data = DB::select("select * from product");
    	//return json_encode($data);
    	//$data = Pr
    }
}
