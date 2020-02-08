@extends('layout.master')
@section('title', 'Table Example')
@section('parentPageTitle', 'Table')


@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
       
        <div class="card">
            <div class="header">
                <h2>Hóa Đơn</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover m-b-0 c_list">
                        <thead>
                            <tr>
                                <th class="text-center">STT
                                </th>
                                <th class="text-center">Ngày Lập</th>                                    
                                <th class="text-center">Lô Hàng Xuất</th>                                    
                                <th class="text-center">Số Lô Hàng Xuất</th>
                                <th class="text-center">Nhà Nhập Khẩu</th>
                                <th class="text-center">Số Xe</th>  <th class="text-center">Công Ty</th>                                  
                                <th class="text-center">Nhân Viên Tạo</th>
                                  <th class="text-center">Tác Vụ</th>
                               
                            </tr>
                        </thead>
                            <tbody>
                            @php $i = 0; @endphp
                            @foreach($exportBills as $exportBill )
                            @php $i++; @endphp
                            <tr data-href="{{route('pages.profile1')}}">
                                <td>
                                    <p class="c_name">{{$i}}</p>
                                </td>
                                <td style="width: 50px;">
                                    <p class="c_name">{{$exportBill ->exportDate}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="c_name">{{$exportBill ->exportShipment}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="c_name">{{$exportBill ->numberExportShipment}}</p>
                                </td >
                                <td class="text-center">
                                    <p class="c_name">{{$exportBill ->importer}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="c_name">{{$exportBill ->carNumber}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="c_name">{{$exportBill ->category->nameCategory}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="c_name">{{$exportBill ->staff->nameStaff}}</p>
                                </td>
                                
                                <td class="text-center" >   
                                <a class="btn btn-success" href="{{route('exportbilldetail.list',$exportBill->id)}}"><i class="fa fa-plus-square-o"></i></a>    
                                                                    
                                    <button type="button" class="btn btn-info" title="Sửa" data-toggle="modal" data-target="#myModal{{$i}}" ><i class="fa fa-pencil"></i></button>

                                     
            <!-- Modal -->  
              <div class="modal fade" id="myModal{{$i}}" role="dialog">
                <div class="modal-dialog">
                
                  ---------------------------
                                   <!-- Modal content-->
                 <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                             
                              <h4 class="text-center">Chỉnh Sửa Sản Phẩm: HDNH{{$exportBill ->id}}</h4>
                            </div>
                            <div class="modal-body">
                                <form id="basic-form" action="{{route('exportbill.editexportbill')}}" method="get" novalidate="">
                    <input type="hidden" name="idexportbill" value="{{$exportBill->id}}">
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-6">
                                <div class="form-group">
                        <label>Lô Hàng Nhập Khẩu</label>
                        <input type="text" name="exportShipment" class="form-control" value="{{$exportBill->exportShipment}}" required="">
                    </div>
                    <div class="form-group">
                        <label>Số Lô Hàng Nhập Khẩu</label>
                        <input type="text" name="numberExportShipment" class="form-control" required="" value="{{$exportBill->numberExportShipment}}">
                    </div>
                    <div class="form-group">
                        <label>Nhà Nhập Khẩu</label>
                        <input type="text" class="form-control" required="" name="importer" value="{{$exportBill->importer}}">
                    </div>
                    
                            </div>
                            <div class="col-md-6 col-md-6">
                                 <div class="form-group">
                        <label>Số Xe</label>
                        <input type="text" name="carNumber" class="form-control" required="" value="{{$exportBill->carNumber}}">
                    </div>
                    <div class="form-group">
                        <label>Công Ty</label>
                        <input type="text" name="idCategory" class="form-control" required="" value="{{$exportBill->idCategory}}">
                    </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="Submit" class="btn btn-primary btn-lg" style="width: 25%;">Sửa</button>
                    <button  data-dismiss="modal" type="button"  style="width: 25%;" class="btn btn-danger btn-lg">Hủy</button>
                </form>
                             </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Đóng</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                  </div> 
                      <!-- End Modal -->
 <div style="display: inline-block;">

                                    <form id="basic-form" action="{{route('exportbill.deleteexportbill')}}" method="post" novalidate="">
                                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                                     <input type="hidden" name="idexportbilldelete" value="{{$exportBill ->id}}">
                                    <button type="Submit" data-type="confirm" class="btn btn-danger" title="Delete" onclick="return confirm('Bạn Có Muốn Xóa Hóa Đơn Này Không?');"><i class="fa fa-trash-o"></i></button></form>
                                </div>

                                </td>
                               
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card overflowhidden number-chart">
            <div class="body" style="text-align: center;">
                 <button type="button" id="addProduct"  class="btn btn-success">Thêm Hóa Đơn</button>
            </div>
            
        </div>
    </div>
<div class="row clearfix" id="contentAddProduct" style="display: none;">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Thêm Hóa Đơn</h2>
            </div>
            <div class="body">
                <form id="basic-form" action="{{route('exportbill.addexportbill')}}" method="post" novalidate="">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-6">
                                <div class="form-group">
                        <label>Lô Hàng Nhập Khẩu</label>
                        <input type="text" name="exportShipment" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Số Lô Hàng Nhập Khẩu</label>
                        <input type="text" name="numberExportShipment" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Nhà Nhập Khẩu</label>
                        <input type="text" class="form-control" required="" name="importer">
                    </div>
                    
                            </div>
                            <div class="col-md-6 col-md-6">
                                 <div class="form-group">
                        <label>Số Xe</label>
                        <input type="text" name="carNumber" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Công Ty</label>
                        <input type="text" name="idCategory" class="form-control" required="">
                    </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="Submit" class="btn btn-primary">Thêm</button>
                    <button  id="cannelAddProduct" type="button" class="btn btn-danger">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

  $("#addProduct").click(function(){
    $("#contentAddProduct").slideToggle();
    $("#contentAddCategory").hide();
    $("HTML, BODY").animate({scrollTop: $("#contentAddProduct").offset().top - 100}, 1000);
  });
  $("#cannelAddProduct").click(function(){
    $("#contentAddProduct").hide();
   // $("HTML, BODY").animate({scrollTop: $("#contentAddProduct").offset().top - 100}, 1000);
  });
  //$('#food').multiselect();
});
</script>
@stop

@section('page-script')
    
    $('.sparkbar').sparkline('html', { type: 'bar' });

@stop