<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\WareHouse;
use App\Category;
//use App\CongTy;
//use App\User;
//use App\CommentJob;

class WareHouseController extends Controller
{
    //
    public function __construct()
    {
    	
    }
    public function getAllWareHouse()
    {
    	$WareHouses = WareHouse::All();
    	return view('dashboard.analytical',['WareHouses'=>$WareHouses]);
    }
    public function createWareHouse(Request $request)
    {
    	$WareHouse = new WareHouse();
    	$WareHouse->name = $request->name;
    	$WareHouse->acreage = $request->acreage;
    	$WareHouse->save();
    	return redirect('dashboard')-> with('thongbao','Thêm thành công'); 
    }
}
