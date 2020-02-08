<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\ExportBill;
use App\Category;
use Session;

class ExportBillController extends Controller
{
    public function __construct()
    {
    	
    }
    public function list()
    {
    	$exportBills = ExportBill::All();
    	return view('bill.exportbill',['exportBills'=>$exportBills]);
    }
    public function addExportBill(Request $request)
    {
    	$ExportBill = new ExportBill();
    	$ExportBill->exportShipment = $request->exportShipment;
    	$ExportBill->numberExportShipment = $request->numberExportShipment;
    	$ExportBill->importer = $request->importer;
    	$ExportBill->carNumber = $request->carNumber;
    	$ExportBill->idCategory = 1;//$request->exportShipment;
    	$ExportBill->idStaff = Session::get('idNameLogined');//$request->exportShipment;
    	$ExportBill->exportDate = new DateTime('now');
    	$ExportBill->save();
    	return redirect('exportbill');//-> with('thongbao','Thêm thành công'); 
    }
     function editExportBill(Request $request)
    {
    	 DB::table('ExportBill')->where('id',$request->idexportbill)->update(['exportShipment'=>$request->exportShipment,'numberExportShipment'=>$request->numberExportShipment,'importer'=>$request->importer,'carNumber'=>$request->carNumber,'idCategory'=>$request->idCategory]);
    	return redirect('exportbill');
    }
    function deleteExportBill(Request $request)
    {
    	DB::table('ExportBill')->where('id','=',$request->idexportbilldelete)->delete();
    	return redirect('exportbill');
    }

     public function getExportBill()
    {
        $data = DB::table('exportBill')
        ->join('staff', 'staff.id', '=', 'exportBill.idStaff')
        ->join('category', 'category.id', '=', 'exportBill.idCategory')
        ->select('exportDate', 'exportShipment', 'numberExportShipment', 'importer','carNumber','nameStaff','nameCategory')->get();
        return json_encode($data);
    }
}
