<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;
use DateTime;
use App\Product;
use App\Category;
use App\ExportBill;
use App\ExportDetails;
use App\ImportDetails;
use App\ImportBill;

//excel
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;



class ProductController extends Controller implements FromCollection, WithHeadings
{
    //
    protected $endDay;
    protected $beginDay;


    public function __construct(Request $request)
    {       
        //$user = User::all();
        //view()->share('user',$user);

        $this->beginDay = $request->get("begin");  
        $this->endDay = $request->get("end");
        $products = Product::all();
        view()->share('products',$products);
    }
    
    function list()
    {
        $products = Product::all();
        return view('product.listproduct',['products'=>$products]);
    }
    function addproduct(Request $request)
    {
        $products = new Product();
        $products->code = $request->codeproduct;
        $products->nameProduct = $request->nameproduct;
        $products->caculationType = $request->caculationtype;
        $products->weight = $request->weight;
        $products->height = $request->height;
        $products->width = $request->width;
        $products->enable = $request->eable==="eable" ? 1 : 0;
        $products->length = $request->length;
        $products->save();
        return redirect('product');
    }
     function editproduct(Request $request)
    {
         DB::table('Product')->where('id',$request->idproduct)->update(['code'=>$request->codeproduct,'nameProduct'=>$request->nameproduct,'enable'=>$request->eable === "eable" ? 1 : 0,'caculationType'=>$request->caculationtype,'weight'=>$request->weight,'height'=>$request->height,'length'=>$request->length,'width'=>$request->width]);
        return redirect('product');
    }
    function deleteproduct(Request $request)
    {
        DB::table('Product')->where('id','=',$request->idproductdelete)->delete();
        return redirect('product');
    }
    public function getExportBill(Request $request)
    {
        if($request['myData'] == 'data')
        {
        $data = DB::table('exportBill')
        ->join('staff', 'staff.id', '=', 'exportBill.idStaff')
        ->join('category', 'category.id', '=', 'exportBill.idCategory')
        ->select('exportDate', 'exportShipment', 'numberExportShipment', 'importer','carNumber','nameStaff','nameCategory','exportBill.id')->get();
        return json_encode($data);
        }
    }


     public function getImportBill(Request $request)
    {
        if($request['myData'] == 'data')
        {
        $data = DB::table('importBill')
        ->join('staff', 'staff.id', '=', 'importBill.idStaff')
        ->join('category', 'category.id', '=', 'importBill.idCategory')
        ->select('importDate', 'enterShipment', 'numberEnterShipment', 'importer','carNumber','nameStaff','nameCategory','importbill.id')->get();
        return json_encode($data);
        }
    }

    public function getProductByDate2(Request $request)
    {
        $results = DB::select("call checkinventory1(?,?)", array($request->begin,$request->end));
        return json_encode($results);
    }
  
    public function createExportBill(Request $request)
    {
         $json = $request->myData;
         $results = json_decode($json, true);//->{'details'};
         $exportBill = new exportBill();
         $dateNow = new DateTime('now');
          //echo("sadsad : ".$results['informationExportBill']['importer']);
         /*
        
         */
        $exportBill->exportDate = $dateNow;
        $exportBill->exportShipment = $results['informationExportBill']['exportShipment'];
        $exportBill->numberExportShipment = $results['informationExportBill']['numberExportShipment']; 
        $exportBill->importer = $results['informationExportBill']['importer'];
        $exportBill->carNumber = $results['informationExportBill']['carNumber'];
        $exportBill->idCategory = 1;
        $exportBill->idStaff =  1;
        $exportBill->save();
        $idExportBill = $exportBill->id;

         foreach ($results['details'] as $value)
         {

            $ExportDetails = new ExportDetails();
            $ExportDetails->idExportBill = $idExportBill;
            $ExportDetails->idProduct = (int)$value['idProduct']; 
            $ExportDetails->numberOf =(int)$value['numberProduct'];
            $ExportDetails->attention = $value['attention'];
            $ExportDetails->save();
           
         }
    }
    

    public function createImportBill(Request $request)
   {
        $json = $request->myData;
        $results = json_decode($json, true);//->{'details'};
        $importBill = new ImportBill();
        $dateNow = new DateTime('now');
        $importBill->importDate = $dateNow;
        $importBill->enterShipment = $results['informationExportBill']['exportShipment'];
        $importBill->numberEnterShipment = $results['informationExportBill']['numberExportShipment']; 
        $importBill->importer = $results['informationExportBill']['importer'];
        $importBill->carNumber = $results['informationExportBill']['carNumber'];
        $importBill->idCategory = 1;
        $importBill->idStaff =  1;
        $importBill->save();
        $idExportBill = $importBill->id;
         foreach ($results['details'] as $value)
         {

            $ImportDetails = new ImportDetails();
            $ImportDetails->idImportBill = $idExportBill;
            $ImportDetails->idProduct = (int)$value['idProduct']; 
            $ImportDetails->numberOf =(int)$value['numberProduct'];
            $ImportDetails->attention = $value['attention'];
            $ImportDetails->save();
         }
         return "ok";
    }

    public function getImportDetails(Request $request)
    {
        $data = DB::table("ImportDetails")->join('product', 'product.id', '=', 'ImportDetails.idProduct')->join('ImportBill', 'ImportBill.id', '=', 'ImportDetails.idImportBill')->join('Category', 'Category.id', '=', 'ImportBill.idCategory')->join('staff', 'staff.id', '=', 'ImportBill.idStaff')->where('idImportBill','=',$request->id)->select('product.nameProduct','ImportDetails.numberOf','attention','idImportBill','importDate','enterShipment','importer','carNumber','numberEnterShipment','nameStaff','nameCategory','idCategory','importDetails.id')->get();
        return json_encode($data);
    }


    public function getExportDetails(Request $request)
    {
        $data = DB::table("ExportDetails")->join('product', 'product.id', '=', 'ExportDetails.idProduct')->join('ExportBill', 'ExportBill.id', '=', 'ExportDetails.idExportBill')->join('Category', 'Category.id', '=', 'ExportBill.idCategory')->join('staff', 'staff.id', '=', 'ExportBill.idStaff')->where('idExportBill','=',$request->id)->select('product.nameProduct','ExportDetails.numberOf','attention','idExportBill','exportDate','exportShipment','importer','carNumber','numberExportShipment','nameStaff','nameCategory','idCategory','ExportDetails.id')->get();
        return json_encode($data);
    }

    public function editExportBill(Request $request)
    {
         $json = $request->myData;
         $results = json_decode($json, true);
         $id = $results['informationBill']['idBill'];
         $importer = $results['informationBill']['importer'];
         $exportShipment = $results['informationBill']['exportShipment'];
         $numberExportShipment = $results['informationBill']['numberExportShipment'];
         $carNumber = $results['informationBill']['carNumber'];

         $exportBill = exportBill::find($id);
         $exportBill->importer = $importer;
         $exportBill->exportShipment = $exportShipment;
         $exportBill->numberExportShipment = $numberExportShipment;
         $exportBill->carNumber = $carNumber;
         $exportBill->save();

         foreach ($results['details'] as $value)
         {

            $ExportDetails = ExportDetails::find((int)$value['idDetailBill']);
            $ExportDetails->numberOf =(int)$value['numberProduct'];
            $ExportDetails->attention = $value['attention'];
            $ExportDetails->save();
         }
         return $id;
    }

    public function deleteExportBill(Request $request)
    {
        //ExportBill::find()->delete(73);
        $id = $request->idExportBill;
        DB::table("exportBill")->where("id","=",$id)->delete();
        return $id;
    }

    
    public function editImportBill(Request $request)
    {
        
         $json = $request->myData;
         $results = json_decode($json, true);
         $id = $results['informationBill']['idBill'];
         $importer = $results['informationBill']['importer'];
         $enterShipment = $results['informationBill']['enterShipment'];
         $numberEnterShipment = $results['informationBill']['numberEnterShipment'];
         $carNumber = $results['informationBill']['carNumber'];

         $importBill = importBill::find($id);
         $importBill->importer = $importer;
         $importBill->enterShipment = $enterShipment;
         $importBill->numberEnterShipment = $numberEnterShipment;
         $importBill->carNumber = $carNumber;
         $importBill->save();

         foreach ($results['details'] as $value)
         {

            $ImportDetails = importDetails::find((int)$value['idDetailBill']);
            $ImportDetails->numberOf =(int)$value['numberProduct'];
            $ImportDetails->attention = $value['attention'];
            $ImportDetails->save();
         }
         return $id;
    }

    public function deleteImportBill(Request $request)
    {
        //ExportBill::find()->delete(73);
        $id = $request->idImportBill;
        DB::table("importBill")->where("id","=",$id)->delete();
        return $id;
    }


    //export excel begin
    public function collection()
    {
        
        $rows = DB::select("call checkinventory1(?,?)", array($this->beginDay,$this->endDay));
        $stt = 0;
        foreach ($rows as $row) 
        {
            $stt++;
            $data[] = array(
                '0' => $stt,
                '1' => $row->namp,
                '2' => $row->codep,
                '3' => $row->caculationP,
                '4' => $row->ton1,
                '5' => $row->vP,
                '6' => $row->bang2import,
                '7' => $row->vimporttotalb2,
                '8' => $row->ton3,
                '9' => $row->vtotalbang3,
            );
        }
        return (collect($data));
    }

    public function headings(): array
    {
        return [
            'STT',
            'Tên Sản Phẩm',
            'Mã',
            'Kiểu Tính',
            'Tồn Trước',
            'Thể Tích',
            'Tồn Trong Khoảng Kiểm Tra',
            'Thể Tích',
            'Tồn Sau',
            'Thể Tích',
        ];
    }

    public function export(Request $request)
    {
        if($request->begin != '' && $request->end != '')
        {
           // return "ok";
         return Excel::download(new ProductController($request), 'products.xlsx');
        }
    }

    //export excel end
}
