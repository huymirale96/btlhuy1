<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\WareHouse;
use App\Category;

use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    public function __construct()
    {
        $WareHouses = WareHouse::All();
        view()->share('WareHouses',$WareHouses);
    }
     public function addwarehouse(Request $request)
    {
        $WareHouse = new WareHouse();
        $WareHouse->name = $request->name;
        $WareHouse->acreage = $request->acreage;
        if($request->activated === "activated")
        {
            $WareHouse->activated = 1;
        }
        else
        {
            $WareHouse->activated = 0;
        }
         //$WareHouse->activated=>$request['activated'] == 'true' ? 1 : 0;
        $WareHouse->save();
       return redirect('dashboard')-> with('thongbao','Thêm thành công'); 
        
    }

       public function editwarehouse(Request $request)
    {
        DB::table('WareHouse')->where('id',$request->idWareHouse)->update(['name'=>$request->name,'acreage'=>$request->acreage,'activated'=>$request->activated === "activated" ? 1 : 0]);
       return redirect('dashboard');
        
    }
    function analytical(){
    	return view('dashboard.analytical');
    }

    function demographic(){
    	return view('dashboard.demographic');
    }

    function hospital(){
    	return view('dashboard.hospital');
    }

    function university(){
    	return view('dashboard.university');
    }
    
    function realEstate(){
    	return view('dashboard.real-estate');
    }

    function project(){
    	return view('dashboard.project');
    }

    function bitcoin(){
    	return view('dashboard.bitcoin');
    }

    function ecommerce(){
    	return view('dashboard.ecommerce');
    }
    
    function iot(){
    	return view('dashboard.iot');
    }
}
