<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\ExportBill;
use App\ExportDetails;
use App\Product;
class ExportBillDetailsController extends Controller
{
    //
	 public function __construct()
    {       
        
    }
    public function list($idExportBill)
    {
    	if($idExportBill != null)
    	{
        session(['idExportBill' => $idExportBill]);
        }
        $products = Product::All();
       	$exportDetails = DB::table('ExportDetails')->where('idExportBill',"=",$idExportBill)->get();
        return view('bill.exportbilldetail',['exportDetails'=>$exportDetails,'products'=>$products]);
    }
    public function addExportBillDetail(Request $request)
    {
    	$ExportDetails = new ExportDetails();
    	$ExportDetails->idProduct = $request->idProduct;
    	$ExportDetails->numberOf = $request->numberProduct;
    	$ExportDetails->attention = $request->attention;
    	$ExportDetails->idExportBill = Session::get('idExportBill');
    	$ExportDetails->save();
    	return redirect('exportbilldetail/list/'.Session::get('idExportBill'))-> with('thongbao','Thêm thành công'); 
    }
}