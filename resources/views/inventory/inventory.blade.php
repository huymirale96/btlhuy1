@extends('layout.master')
@section('title', 'Table Example')
@section('parentPageTitle', 'Table')


@section('content')

<div class="row clearfix">
<div class="col-lg-12">
  <div class="card">
  <div class="form-inline" style="margin: 20px;">
  <lable>Từ ngày</lable>
  <input class="form-control"  type="date" style="width: 150px;"
  id="beginDay"/>&nbsp&nbsp&nbsp
  <lable>Đến  ngày</lable>
  <input class="form-control" style="width: 150px; margin-left: 20px;" type="date" id="endDay"/>
  <button class="btn btn-warning" style="margin-left: 20px;" id="btnCheckInventory">Kiểm Tra Tồn</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
  <div id="linkToDowload" style="display: inline;"></div>
</div>
<br><br>
<div class="table-responsive">
  <table class="table table-hover m-b-0 c_list" id="table1" style="color: black;">
    <thead>

      <tr>
        <th colspan='6'>Thông số sản phẩm</th>
        <th colspan='2'>Tồn đầu</th>
        <th colspan='2'>Nhập</th>
        <th colspan='2'>Xuất</th>
        <th colspan='2'>Tồn cuối</th>

      </tr>
      <tr>
        <th>Chọn</th>
        <th>STT</th>
        <th>PRODUCT</th>
        <th>CODE</th>
        <th>QUY CÁCH</th>
        <th>Cái/Thùng</th>
        <th>Tồn Đầu</th>
        <th>V-W</th>
        <th>Nhập</th>
        <th>V-W</th>
        <th>XUất</th>
        <th>V-P</th>
        <th>Tồn Cuối</th>
        <th>V-P</th>
      </tr>
    </thead>
    <tbody class="rowInventory">

</tbody>
</table>
</div>
</div>
</div>

<div class="card">
<div class="col-md-12" style="margin: 15px;">
<button class="btn btn-warning"  type='button' data-toggle="modal" data-target="#addProductModal">Thêm sản phẩm</button>

<!--Modal Add Product-->
<div id="addProductModal" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h2 class="modal-title"></h2>
    </div>
    <div class="modal-body">
      <h4 class="text-center">Thêm Sản Phẩm</h4>
       <div class="body">
          <form id="basic-form" action="{{route('product.addproduct')}}" method="post" novalidate="">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-md-6">
                  <div class="form-group">
                    <label>Code</label>
                    <input type="text" name="codeproduct" class="form-control" required="">
                  </div>
                  <div class="form-group">
                    <label>Tên Sản Phẩm</label>
                    <input type="text" name="nameproduct" class="form-control" required="">
                  </div>
                  <div class="form-group">
                    <label>Quy Cách</label>
                    <input type="text" class="form-control" required="" name="caculationtype">
                  </div>
                  <div class="form-group">
                    <label>Kích hoạt</label>
                    <br>
                    <label class="fancy-radio">
                      <input type="radio" name="eable" value="eable" required="" checked data-parsley-errors-container="#error-radio" data-parsley-multiple="gender">
                      <span><i></i>Có</span>
                    </label>
                    <label class="fancy-radio">
                      <input type="radio" name="eable" value="uneable" data-parsley-multiple="gender">
                      <span><i></i>Không</span>
                    </label>
                    <p id="error-radio"></p>
                  </div>
                </div>
                <div class="col-md-6 col-md-6">
                 <div class="form-group">
                  <label>Cân Nặng</label>
                  <input type="number" name="weight" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Chiều Cao</label>
                  <input type="number" name="height" class="form-control" required="">
                </div>
                <div class="form-group">
                  <label>Độ Dài</label>
                  <input type="number" class="form-control" required="" name="length">
                </div>
                <div class="form-group">
                  <label>Độ Rộng</label>
                  <input type="number" class="form-control" required="" name="width">
                </div>
              </div>
            </div>
          </div>
          <br>
          <button type="Submit" class="btn btn-primary">Thêm</button>
          <button type="reset"  class="btn btn-danger">Nhập Lại</button>
          <button  id="cannelAddProduct" type="button" class="btn btn-warning">Hủy</button>
        </form>
      </div>
       
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div>
<!--End Modal Add Product-->
 


<br><br>
<button id="createImportBill" class="btn btn-warning addBillExport1"  type='button' >Nhập</button>
<button id="createExportBill" class="btn btn-warning"  type='button' >Xuất</button>




<!--Modal Bill-->
<div id="modalBillImport" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h2 class="modal-title"></h2>
    </div>
    <div class="modal-body">
      <h4 class="text-center">Đơn Nhập Hàng</h4>
      <div id="content1">
        <div class="row">
          <div class="col-md-12 text-center">
            <table style="margin-bottom: 15px; color: black;">
              <tr>
                <td>Lô Hàng:</td>
                <td><input class="form-control" type="text" name="exportShipment" id="exportShipmentim"></td>
              </tr>
              <tr>
                <td>Số Lô Hàng:</td>
                <td><input class="form-control"type="text" name="numberExportShipment" id="numberExportShipmentim"></td>
              </tr>
              <tr>
                <td>Nhà Nhập Khẩu:</td>
                <td><input class="form-control"type="text" name="importer" id="importerim"></td>
              </tr>
              <tr>
                <td>Số Xe:</td>
                <td><input class="form-control" type="text" name="carNumberim" id="carNumberim"></td>
              </tr>
              <tr>
                <td>Công Ty:</td>
                <td><select class="form-control" id="idCategory">
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select></td>
              </tr>
            </table>
          </div>
          <div id=divtable1></div>

        </div>
        <btn id="completeCreateImportBill" class="btn btn-success" data-dismiss="modal">Hoàn Thành</btn>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div>
<!--End Modal Bill-->

<!--Modal Bill-->
<div id="modalBillExport" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h2 class="modal-title"></h2>
    </div>
    <div class="modal-body">
      <h4 class="text-center">Đơn Xuất Hàng</h4>
      <div id="content1">
        <div class="row">
          <div class="col-md-12 text-center">
            <table style="margin-bottom: 15px; color: black;">
              <tr>
                <td>Lô Hàng:</td>
                <td><input class="form-control" type="text" name="exportShipment" id="exportShipmentEx"></td>
              </tr>
              <tr>
                <td>Số Lô Hàng:</td>
                <td><input class="form-control"type="text" name="numberExportShipment" id="numberExportShipmentEx"></td>
              </tr>
              <tr>
                <td>Nhà Nhập Khẩu:</td>
                <td><input class="form-control"type="text" name="importer" id="importerEx"></td>
              </tr>
              <tr>
                <td>Số Xe:</td>
                <td><input class="form-control" type="text" name="carNumber" id="carNumberEx"></td>
              </tr>
              <tr>
                <td>Công Ty:</td>
                <td><select class="form-control" id="idCategoryEx">
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select></td>
              </tr>
            </table>
          </div>
          <div id=divtable2></div>

        </div>
        <btn id="completeCreateExportBill" class="btn btn-success" data-dismiss="modal">Hoàn Thành</btn>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div>
<!--End Modal Export Bill-->
<br>
</div>
</div>
<div class="card">
<div class="col-md-12">
<h3>Nhập xuất hàng</h3>
<div style="display: inline-block; margin-bottom: 12px;">
  <button class="btn btn-warning"  type='button' >Tất cả</button>
  <button class="btn btn-warning"  type='button' id="btnViewImportBill">Phiếu nhập</button>
  <button class="btn btn-warning"  type='button'  id="btnViewExportBill">Phiếu Xuất</button>
</div>

 
<div class="row">
  <div class="col-md-12">
    <h2 class="text-center" id="nameBill"></h2>
    <table class="table table-bordered text-center" style="color: black;">
      <thead>
        <th>STT</th>
        <th>Ngày</th>
        <th>Lô Hàng</th>
        <th>Số Lô Hàng</th>
        <th>Số Xe</th>
        <th>Nhà Nhập Khẩu</th>
        <th>Công Ty</th>
        <th>Nhân Viên</th>
        <th>Thao Tác</th>
      </thead>
      <tbody class="viewBills">
        <tr><td class="text-center" colspan="9">Chưa có dữ liệu.</td></tr>
      </tbody>
    </table>
  </div>
  <div class="col-md-12">
    <div id="detailBills" style="color: black;"></div>
  </div>
</div>
</div>
</div>

</div>
<button id="btn2" onclick="showBill(1)">BTN</button>

<!--Modal Bill Edit-->
<div id="modalEdit" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

  <!-- Modal Edit-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h2 class="modal-title"></h2>
    </div>
    <div class="modal-body">
      <h4 class="text-center" id="idBillHeader">Đơn Xuất Hàng</h4>
      <div id="content1">
        <div class="row">
          <div class="col-md-12 text-center">
            <div style="display: none;" id="idBillEdit1"></div>
            <table style="margin-bottom: 15px; color: black;">
              <tr>
                <td>Lô Hàng:</td>
                <td><input class="form-control" type="text" name="exportShipment" id="shipmentEdit"></td>
              </tr>
              <tr>
                <td>Số Lô Hàng:</td>
                <td><input class="form-control"type="text" name="numberExportShipment" id="numberShipmentEdit"></td>
              </tr>
              <tr>
                <td>Nhà Nhập Khẩu:</td>
                <td><input class="form-control"type="text" name="importer" id="importerEdit"></td>
              </tr>
              <tr>
                <td>Số Xe:</td>
                <td><input class="form-control" type="text" name="carNumberEdit" id="carNumberEdit"></td>
              </tr>
              <tr>
                <td>Công Ty:</td>
                <td><select class="form-control" id="idCategoryEx">
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select></td>
              </tr>
            </table>
          </div>
          <div id="editContent"></div>

        </div>
        
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>

</div>
</div>
<!--End Modal Bill-->

<script>
    function isNumberKey(evt){
      var charCode = (evt.which) ? evt.which : evt.keyCode
      return !(charCode > 31 && (charCode < 48 || charCode > 57));
    }

    function rowDelete(e) {
      $(e).parents('tr').remove();
    }

        function showImportDetails(idbill)
    {
     //alert("id "+idbill);
      $.ajax({
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        type: 'get',
        url:'{{route("getimportdetails")}}',
        dataType: 'json',
        data: {id: idbill},
        success: function(data)
        {
         //alert(JSON.stringify(data));
          var stt = 0;
          var _html = '<br><h3>Chi Tiết Hóa Đơn Nhập HDX00'+ data[0].idImportBill+'</h3>';
          _html += '<div class="container-fluid"><div class="row"><div class="col-md-6"><p>Công Ty: '+ data[0].nameCategory +'</p><p>Nhân Viên: '+ data[0].nameStaff +'</p><p>Số Hóa Đơn: HD00'+ data[0].idImportBill +'</p><p>Ngày Lập Hóa Đơn: '+ data[0].importDate+'</p></div><div class="col-md-6"><p>Lô Hàng: '+ data[0].enterShipment +'</p><p>Số Lô Hàng: '+ data[0].numberEnterShipment+'</p><p>Nhà Nhập Khẩu: '+ data[0].importer+'</p><p>Số Xe: '+ data[0].carNumber+ '</p></div></div></div><br>';
          _html += '<table class="table table-bordered text-center" id="" style=" color: black;><thead><tr class="text-center"><th>STT</th><th>Sản Phẩm</th><th>Số lượng</th><th>Ghi Chú</th></tr></thead><tbody id="">';
          var _html1 = '</td><td style="width: 15%;"><input type="number" value="0" min=0 name="numberProduct" class="form-control" onkeypress="return isNumberKey(event);"></td ><td><input type="text" name="da" class="form-control"  placeholder="Ghi Chú"></td><td style="display: none;">';
           $.each(data, function(index, item) {
            stt++;
           _html += '<tr><td>'+ stt + '</td><td>'+item.nameProduct+'</td><td>'+item.numberOf +'</td><td>'+item.attention +'</td></tr>';
          });
          _html += '</tbody></table><br><div class="row"><div class="col-md-12 text-center" style="margin-bottom: 50px;"><button class="btn btn-info" id="editImportBill" data-toggle="modal" data-target="#modalEdit">Chỉnh Sửa</button><button class="btn btn-danger " id="deleteImportBill" onClick="deleteImportBill('+ data[0].idImportBill +')" style="width: 95px;   margin-left: 10px;">Xóa</button></div></div>';

         $("#detailBills").html(_html);
         $('html, body').animate({
                    scrollTop: $("#detailBills").offset().top
                }, 1000);

         //Modal Edit Bill
$('#shipmentEdit').val(data[0].enterShipment);
$('#numberShipmentEdit').val(data[0].numberEnterShipment);
$('#importerEdit').val(data[0].importer);
$('#carNumberEdit').val(data[0].carNumber);
$('#idBillHeader').html('Đơn Nhập Hàng: HD00'+data[0].idImportBill);
$('#idBillEdit1').html(data[0].idImportBill);


var stt_ = 0;
var _htmle = '';
var _htmle = '<table class="table table-bordered text-center" id="tableEdit" style=" color: black;><thead><tr class="text-center"><th>STT</th><th>Sản Phẩm</th><th>Số lượng</th><th>Ghi Chú</th></tr></thead><tbody id="contentModalExpBill">';
var _html1 = '</td><td style="width: 15%;"><input type="number" value="';
var _html2 ='" min=0 name="numberProduct" class="form-control" onkeypress="return isNumberKey(event);"></td ><td><input type="text" name="attention" class="form-control"  value="';
var _html3 = '"></td><td style="display: none;">';
$("#tableEdit").html('');
//alert(JSON.stringify(data));
 $.each(data, function(index, item) {
        stt_ ++;
        _htmle += '<tr><td>'+stt_+'</td>';
        _htmle += '<td style="width: 35%;">';
        _htmle += item.nameProduct;
        _htmle+= _html1;
        _htmle += item.numberOf;
        _htmle += _html2;
        _htmle += item.attention;
        _htmle += _html3;
        _htmle += item.id;
        _htmle += '</td></tr>';
    });
     _htmle += '</tbody></table><btn id="completeEditImportBill" onClick="completeEditImportBill()" class="btn btn-success" data-dismiss="modal">Hoàn Thành</btn>';
      $("#editContent").html(_htmle);
      //$('#modalEdit').modal();



  



        },
        error: function(error)
        {
          alert("Have some error. "+error);
        },
      });
    }

    function showExportDetails(idbill)
    {
     //alert("id "+idbill);
      $.ajax({
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        type: 'get',
        url:'{{route("getexportdetails")}}',
        dataType: 'json',
        data: {id: idbill},
        success: function(data)
        {
         // alert(data[0].nameCategory);

         //alert(JSON.stringify(data));
          var stt = 0;
          var _html = '<br><h3>Chi Tiết Hóa Đơn Xuất HDX00'+ data[0].idExportBill+'</h3>';
          _html += '<div class="container-fluid"><div class="row"><div class="col-md-6"><p>Công Ty: '+ data[0].nameCategory +'</p><p>Nhân Viên: '+ data[0].nameStaff +'</p><p>Số Hóa Đơn: HD00'+ data[0].idExportBill +'</p><p>Ngày Lập Hóa Đơn: '+ data[0].exportDate+'</p></div><div class="col-md-6"><p>Lô Hàng: '+ data[0].exportShipment +'</p><p>Số Lô Hàng: '+ data[0].numberExportShipment+'</p><p>Nhà Nhập Khẩu: '+ data[0].importer+'</p><p>Số Xe: '+ data[0].carNumber+ '</p></div></div></div><br>';
          _html += '<table class="table table-bordered text-center" id="" style=" color: black;><thead><tr class="text-center"><th>STT</th><th>Sản Phẩm</th><th>Số lượng</th><th>Ghi Chú</th></tr></thead><tbody id="">';
           $.each(data, function(index, item) {
            stt++;
           _html += '<tr><td>'+ stt + '</td><td>'+item.nameProduct+'</td><td>'+item.numberOf +'</td><td>'+item.attention +'</td></tr>';
          });
          _html += '</tbody></table><br><div class="row"><div class="col-md-12 text-center" style="margin-bottom: 50px;"><button class="btn btn-info" id="editExportBill" data-toggle="modal" data-target="#modalEdit">Chỉnh Sửa</button><button class="btn btn-danger " style="width: 95px;   margin-left: 10px;" id="deleteExportBill" onClick="deleteExportBill('+ data[0].idExportBill +')">Xóa</button></div></div>';
         $("#detailBills").html(_html);
         $('html, body').animate({
                    scrollTop: $("#detailBills").offset().top
                }, 1000);

      
//Modal Edit Bill
$('#shipmentEdit').val(data[0].exportShipment);
$('#numberShipmentEdit').val(data[0].numberExportShipment);
$('#importerEdit').val(data[0].importer);
$('#carNumberEdit').val(data[0].carNumber);
$('#idBillHeader').html('Đơn Xuất Hàng: HD00'+data[0].idExportBill);
$('#idBillEdit1').html(data[0].idExportBill);


var stt_ = 0;
var _htmle = '';
var _htmle = '<table class="table table-bordered text-center" id="tableEdit" style=" color: black;><thead><tr class="text-center"><th>STT</th><th>Sản Phẩm</th><th>Số lượng</th><th>Ghi Chú</th></tr></thead><tbody id="contentModalExpBill">';
var _html1 = '</td><td style="width: 15%;"><input type="number" value="';
var _html2 ='" min=0 name="numberProduct" class="form-control" onkeypress="return isNumberKey(event);"></td ><td><input type="text" name="attention" class="form-control"  value="';
var _html3 = '"></td><td style="display: none;">';
$("#tableEdit").html('');
//alert(JSON.stringify(data));
 $.each(data, function(index, item) {
        stt_ ++;
        _htmle += '<tr><td>'+stt_+'</td>';
        _htmle += '<td style="width: 35%;">';
        _htmle += item.nameProduct;
        _htmle+= _html1;
        _htmle += item.numberOf;
        _htmle += _html2;
        _htmle += item.attention;
        _htmle += _html3;
        _htmle += item.id;
        _htmle += '</td></tr>';
    });
     _htmle += '</tbody></table><btn id="completeEditExportBill" onclick="completeEditExportBill()" class="btn btn-success" data-dismiss="modal">Hoàn Thành</btn>';
      $("#editContent").html(_htmle);
      


        },
        error: function(error)
        {
          alert("Have some error. "+error);
        },
      });
    }


    function deleteExportBill(id)
    {
     // alert("ok+"+id);
      var cf = confirm("Bạn Có Muốn Xóa Không !");
      if(cf == true)
      {
      $.ajax({
        type: 'get',
        url: '{{route("deleteexportbill")}}',
        data: { _token : $('meta[name="csrf-token"]').attr('content'), idExportBill : id},
        success: function(data)
        {
          alert("Delete ExportBill Success. "+data);
        },
        error: function(error){
          alert("Some error. "+error);
        },


      });
    }
    }


    function deleteImportBill(id)
    {
     // alert("ok+"+id);
     var cf = confirm("Bạn Có Muốn Xóa Không !");
      if(cf == true)
      {
      $.ajax({
        type: 'get',
        url: '{{route("deleteimportbill")}}',
        data: { _token : $('meta[name="csrf-token"]').attr('content'), idImportBill : id},
        success: function(data)
        {
          alert("Delete ImportBill Success. "+data);
        },
        error: function(error){
          alert("Some error. "+error);
        },


      });
    }
    }

//End modal Edit Bill

/*$('completeEditExportBill#').click(*/
function completeEditExportBill(){
//alert('ok');

var check = 0;
var Bill = new Object();
var detailBill = [];
$("#tableEdit tbody tr").each(function(){
check++;
if(check > 1)
{
  //alert('ok');
  var numberProduct = $(this).find('td:eq(2) input').val();
  var attention = $(this).find('td:eq(3) input').val()
  var idDetailBill = $(this).find("td").eq(4).html();
  //alert(numberProduct+' numberOf');
  var detail = new Object();
  detail.idDetailBill = idDetailBill;
  detail.numberProduct = numberProduct;
  detail.attention = attention;
    //alert(detail.idProduct);
  detailBill.push(detail);
  }
  Bill.details =  detailBill;

});
var informationBill = new Object();
informationBill.exportShipment = $("#shipmentEdit").val();
informationBill.numberExportShipment = $("#numberShipmentEdit").val();
informationBill.importer = $("#importerEdit").val();
informationBill.carNumber = $("#carNumberEdit").val();
informationBill.idBill = $("#idBillEdit1").text();
Bill.informationBill = informationBill;
console.log(JSON.stringify(Bill));

$.ajax({
type: 'get',
url : '{{route("editexportbill")}}',
data: { _token : $('meta[name="csrf-token"]').attr('content'), myData: JSON.stringify(Bill)},
      //data: 'json',
      success: function(data)
      {
       // alert("200");
       if(data != null)
       {
       // alert("Success: "+data);
        showExportDetails(data);
       }
    },
    error: function(error)
    {
      alert("Have some error.");
    },


});

}//);


/*$('#completeEditImportBill').click(function (){*/

function completeEditImportBill(){
alert('ok');

var check = 0;
var Bill = new Object();
var detailBill = [];
$("#tableEdit tbody tr").each(function(){
check++;
if(check > 1)
{
  //alert('ok');
  var numberProduct = $(this).find('td:eq(2) input').val();
  var attention = $(this).find('td:eq(3) input').val()
  var idDetailBill = $(this).find("td").eq(4).html();
  //alert(numberProduct+' numberOf');
  var detail = new Object();
  detail.idDetailBill = idDetailBill;
  detail.numberProduct = numberProduct;
  detail.attention = attention;
    //alert(detail.idProduct);
  detailBill.push(detail);
  }
  Bill.details =  detailBill;

});
var informationBill = new Object();
informationBill.enterShipment = $("#shipmentEdit").val();
informationBill.numberEnterShipment = $("#numberShipmentEdit").val();
informationBill.importer = $("#importerEdit").val();
informationBill.carNumber = $("#carNumberEdit").val();
informationBill.idBill = $("#idBillEdit1").text();
Bill.informationBill = informationBill;
console.log(JSON.stringify(Bill));

$.ajax({
type: 'get',
url : '{{route("editimportbill")}}',
data: { _token : $('meta[name="csrf-token"]').attr('content'), myData: JSON.stringify(Bill)},
      //data: 'json',
      success: function(data)
      {
       // alert("200");
       if(data != null)
       {
       // alert("Success: "+data);
        showImportDetails(data);
       }
    },
    error: function(error)
    {
      alert("Have some error.");
    },


});

}//);




$(document).ready(function(){
     $('#table1 tbody').on('click', 'tr', function() {
      ///console.log('click works!');
      if (event.target.type !== 'checkbox') 
      {
        $(":checkbox", this).trigger("click");
      }
    });

     $("#btn2").click(function(){
      $('#modalEdit').modal();
      alert($('meta[name="csrf-token"]').attr('content'));
    });

     $("#btnCheckInventory").click(function(){
       var beginDay = $('#beginDay').val();
       var endDay = $('#endDay').val();

//alert(beginDay+ " " + endDay);
if(beginDay != '' && endDay != '')
{
if(Date.parse(beginDay) >= Date.parse(endDay)){
    alert("Ngày bắt đầu phải trước ngày sau.");
}
else
{
$.ajax({
  headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
  type: 'POST',
  url:'{{route("getproductbydate2")}}',
  data: {  begin:beginDay, end:endDay},
  dataType:'json',
  success: function(data)
  {
    //alert(data);
    //console.log("seccess "+ JSON.stringify(data));
    //alert(JSON.stringify(data));
    var rowInventory1 ='';
    $.each(data, function(index, item) {
         //alert(item.idP);
         var stt = index + 1 ;
         rowInventory1 += "<tr><td><input class='form-control' type='checkbox' name='record'/></td><td>"+ stt +"</td><td>"+ item.namp +"</td><td>"+item.codep+"</td><td>"+ item.caculationP +"</td><td>50ok</td><td>"+ item.ton1+"</td><td>"+ item.vP +"</td><td>"+item.bang2import +"</td><td>"+item.vimporttotalb2 +"</td><td>"+item.bang2export +"</td><td>"+ item.weighttotalexportb2+"</td><td>"+ item.ton3 +"</td><td>"+ item.vtotalbang3+"</td><td style='display: none;'>"+ item.idP+"</td></tr>";
    });
    $(".rowInventory").html(rowInventory1);
    
    var link = "<a href='{{route('exporttoexcel')}}?begin="+ beginDay +"&end=" + endDay +"' class='text-success' >Tải Xuống Tệp Excel</a>";
    $("#linkToDowload").html(link);
    
  },
  error: function (request, error) 
  {
    console.log("loi " + error);
    alert(error.message);
    alert('Đã xảy ra lỗi, hãy thử lại sau!');
  },
});
}
}
else
{
  alert("Ngày kiểm tra không được trống.");
}
});  

$("#btnViewImportBill").click(function(event){
      event.PreventDefault;
      $("#detailBills").html('');
      $.ajax({
 // headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
 type: 'get',
 url:'{{route('getimportbill')}}',
 data: { _token : $('meta[name="csrf-token"]').attr('content'), myData: 'data'},
 dataType:'json',
 success: function(data)
 {
    //alert(JSON.stringify(data));
    var row ='';
    $.each(data, function(index, item) {
         // alert(item.exportShipment);
         var stt = index + 1 ;
         row +=  '<tr><td>'+stt +'</td><td>'+item.importDate+'</td><td>'+item.enterShipment+'</td><td>'+item.numberEnterShipment+'</td><td>'+item.carNumber+'</td><td>'+item.importer+'</td><td>'+item.nameCategory+'</td><td>'+item.nameStaff+'</td><td><button class="btn btn-warning" type="button" onClick="showImportDetails('+ item.id+');">Sửa</button></td></tr>';
       });
    $("#nameBill").text("Danh Sách Phiếu Nhập");
    $(".viewBills").html(row);
  },
  error: function (request, error) 
  {
    alert(error.message);
    alert('Đã xảy ra lỗi, hãy thử lại sau!');
  },
});
});

$("#btnViewExportBill").click(function(event){
      event.PreventDefault;
      $("#detailBills").html('');
      //$(".viewBills").html('');
      $.ajax({
 // headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
 type: 'POST',
 url:'{{route('getexportbill')}}',
 data: { _token : $('meta[name="csrf-token"]').attr('content'), myData: 'data'},
 dataType:'json',
 success: function(data)
 {
    //alert(JSON.stringify(data));
    var row ='';
    $.each(data, function(index, item) {
         // alert(item.exportShipment);
         var stt = index + 1 ;
         row +=  '<tr><td>'+stt +'</td><td>'+item.exportDate+'</td><td>'+item.exportShipment+'</td><td>'+item.numberExportShipment+'</td><td>'+item.carNumber+'</td><td>'+item.importer+'</td><td>'+item.nameCategory+'</td><td>'+item.nameStaff+'</td><td><button class="btn btn-warning" type="button" onClick="showExportDetails('+ item.id+');">Xem</button></td></tr>';
         //console.log('data: log>> ' + item.importDate + ' ' + item.enterShipment  + ' ' + item.numberEnterShipment + ' ' );
       });
    $("#nameBill").text("Danh Sách Phiếu Xuất");
    $(".viewBills").html(row);
  },
  error: function (request, error) 
  {
    alert(error.message);
    alert('Đã xảy ra lỗi, hãy thử lại sau!');
  },
});
});
  
$("#btnViewExportBill").click(function(event){
      event.PreventDefault;
      $.ajax({
 // headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
 type: 'POST',
 url:'{{route('getexportbill')}}',
 data: { _token : $('meta[name="csrf-token"]').attr('content'), myData: 'data'},
 dataType:'json',
 success: function(data)
 {
    //alert(JSON.stringify(data));
    var row ='';
    $.each(data, function(index, item) {
         // alert(item.exportShipment);
         var stt = index + 1 ;
         row +=  '<tr><td>'+stt +'</td><td>'+item.exportDate+'</td><td>'+item.exportShipment+'</td><td>'+item.numberExportShipment+'</td><td>'+item.carNumber+'</td><td>'+item.importer+'</td><td>'+item.nameCategory+'</td><td>'+item.nameStaff+'</td><td><button class="btn btn-warning" type="buttontype="button" onClick="showExportDetails('+ item.id+');">Xem</button></td></tr>';
       });
    $(".viewBills").html(row);
  },
  error: function (request, error) 
  {
    alert(error.message);
    alert('Đã xảy ra lỗi, hãy thử lại sau!');
  },
});
});

$("#addProduct").click(function(){
    $("#contentAddProduct").slideToggle();
    $("#contentAddCategory").hide();
    $("HTML, BODY").animate({scrollTop: $("#contentAddProduct").offset().top - 100}, 1000);
    $("btnExport").click(function()
    {

    });
  });
   $("#cannelAddProduct").click(function(){
    $("#contentAddProduct").hide();
// $("HTML, BODY").animate({scrollTop: $("#contentAddProduct").offset().top - 100}, 1000);
});
//$('#food').multiselect();  
//addBill 
$("#completeCreateImportBill").click(function(){
//alert('ok');
var check = 0;
var expBill = new Object();
var detailBill = [];
$("#table2im tbody tr").each(function(){
check++;
if(check > 1)
{
  var numberProduct = $(this).find('td:eq(2) input').val();
  var attention = $(this).find('td:eq(3) input').val()
  var idProduct = $(this).find("td").eq(4).html();
  var detail = new Object();
  detail.idProduct = idProduct;
  detail.numberProduct = numberProduct;
  detail.attention = attention;
    //alert(detail.idProduct);
    detailBill.push(detail);
  }
  expBill.details =  detailBill;

});
var informationExportBill = new Object();
informationExportBill.exportShipment = $("#exportShipmentim").val();
informationExportBill.numberExportShipment = $("#numberExportShipmentim").val();
informationExportBill.importer = $("#importerim").val();
informationExportBill.carNumber = $("#carNumberim").val();
informationExportBill.idCategory = $("#idCategoryim").val();
expBill.informationExportBill = informationExportBill;
console.log(JSON.stringify(expBill));
$.ajax({
type: 'get',
url : '{{route("createimportbill")}}',
data: { _token : $('meta[name="csrf-token"]').attr('content'), myData: JSON.stringify(expBill)},
      //data: 'json',
      success: function(data)
      {
       // alert("200");
       if(data == "ok")
       {
        alert("Success");
      }
    },
    error: function(error)
    {
      alert("Have some error.");
    },
  });
$('#modalBillExport').modal('hide');
});

$("#completeCreateExportBill").click(function(){
alert('ok');
var check = 0;
var expBill = new Object();
var detailBill = [];
$("#table2ex tbody tr").each(function(){
check++;
if(check > 1)
{
  var numberProduct = $(this).find('td:eq(2) input').val();
  var attention = $(this).find('td:eq(3) input').val()
  var idProduct = $(this).find("td").eq(4).html();
  var detail = new Object();
  detail.idProduct = idProduct;
  detail.numberProduct = numberProduct;
  detail.attention = attention;
    //alert(detail.idProduct);
    detailBill.push(detail);
  }
  expBill.details =  detailBill;

});
var informationExportBill = new Object();
informationExportBill.exportShipment = $("#exportShipmentEx").val();
informationExportBill.numberExportShipment = $("#numberExportShipmentEx").val();
informationExportBill.importer = $("#importerEx").val();
informationExportBill.carNumber = $("#carNumberEx").val();
informationExportBill.idCategory = $("#idCategoryEx").val();
expBill.informationExportBill = informationExportBill;
//console.log(JSON.stringify(expBill));
$.ajax({
type: 'get',
url : '{{route("createexportbill")}}',
data: { _token : $('meta[name="csrf-token"]').attr('content'), myData: JSON.stringify(expBill)},
      //data: 'json',
      success: function(data)
      {
       // alert("200");
       if(data == "ok")
       {
        alert("Success");
      }
    },
    error: function(error)
    {
      alert("Have some error.");
    },
  });
});

$("#createImportBill").click(function(){
var stt = 0;
var _html = '';
var _html = '<table class="table table-bordered text-center" id="table2im" style=" color: black;><thead><tr class="text-center"><th>STT</th><th>Sản Phẩm</th><th>Số lượng</th><th>Ghi Chú</th></tr></thead><tbody id="contentModalExpBill">';
var _html1 = '</td><td style="width: 15%;"><input type="number" value="0" min=1 name="numberProduct" class="form-control" onkeypress="return isNumberKey(event);"></td ><td><input type="text" name="da" class="form-control"  placeholder="Ghi Chú"></td><td style="display: none;">';
var checked = 'off';
   //alert("dá");
      // $("#contentModalExpBill").empty();
       //$("#table2 > tbody").html("");
     $("#divtable1").html('');
     $("#table1").find('input[name="record"]').each(function(){
       if($(this).is(":checked")){
        stt ++;
        _html += '<tr><td>'+stt+'</td>';
        _html += '<td style="width: 35%;">';
        checked = 'on';
        var idProduct = $(this).parents("tr").find("td").eq(14).html();
        var nameProduct1 = $(this).parents("tr").find("td").eq(2).html();
        _html += nameProduct1;
        _html += _html1;
        _html += idProduct;
        _html += '</td><td><button onClick="rowDelete(this)" class="btn btn-danger">Xóa</button></td></tr>';
      }
    });
     if(checked == 'on')
     {
      _html += '</tbody></table>';
      $("#divtable1").html(_html);
      $('#modalBillImport').modal();
     }
  });

$("#createExportBill").click(function(){
var stt = 0;
var _html = '';
var _html = '<table class="table table-bordered text-center" id="table2ex" style=" color: black;><thead><tr class="text-center"><th>STT</th><th>Sản Phẩm</th><th>Số lượng</th><th>Ghi Chú</th></tr></thead><tbody id="contentModalExpBill">';
var _html1 = '</td><td style="width: 15%;"><input type="number" value="0" min=1 name="numberProduct" class="form-control" onkeypress="return isNumberKey(event);"></td ><td><input type="text" name="da" class="form-control"  placeholder="Ghi Chú"></td><td style="display: none;">';
var checked = 'off';
 //alert("dá");
    // $("#contentModalExpBill").empty();
     //$("#table2 > tbody").html("");
     $("#divtable2").html('');
     $("#table1").find('input[name="record"]').each(function(){
       if($(this).is(":checked")){
        stt ++;
        _html += '<tr><td>'+stt+'</td>';
        _html += '<td style="width: 35%;">';
        checked = 'on';
        var idProduct = $(this).parents("tr").find("td").eq(14).html();
        var nameProduct1 = $(this).parents("tr").find("td").eq(2).html();
        _html += nameProduct1;
        _html += _html1
        _html += idProduct;
        _html += '</td><td><button onClick="rowDelete(this)" class="btn btn-danger">Xóa</button></td></tr>';
      }
    });
     if(checked == 'on')
     {
      _html += '</tbody></table>';
      $("#divtable2").html(_html);
      $('#modalBillExport').modal();
    }
  });


 $('#beginDay').click(function()
 {
    $("#linkToDowload").html('');
 });
 $('#endDay').click(function()
 {
    $("#linkToDowload").html('');
 });
// end of document ready
});
</script>
@stop

@section('page-script')

$('.sparkbar').sparkline('html', { type: 'bar' });

@stop