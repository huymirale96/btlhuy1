@extends('layout.master')
@section('title', 'Table Example')
@section('parentPageTitle', 'Table')


@section('content')

<div class="row clearfix">

    <div class="col-lg-12">
       
        <div class="card">
            <div class="header">
                <h2>Danh Sách Sản Phẩm</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover m-b-0 c_list">
                        <thead>
                            <tr>
                                <th class="text-center">STT
                                </th>
                                <th class="text-center">Mã</th>                                    
                                <th class="text-center">Tên Sản phẩm</th>                                    
                                <th class="text-center">Kiểu Tính</th>
                                <th class="text-center">Cân Nặng</th>
                                <th class="text-center">Chiều Cao</th>                                    
                                <th class="text-center">Trạng Thái</th>
                                <th class="text-center">Tác Vụ</th>
                            </tr>
                        </thead>
                            <tbody>
                            @php $i = 0; @endphp
                            @foreach($products as $product)
                            @php $i++; @endphp
                            <tr>
                                <td>
                                    <p class="c_name">{{$i}}</p>
                                </td>
                                <td style="width: 50px;">
                                    <p class="c_name">{{$product->code}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="c_name">{{$product->nameProduct}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="c_name">{{$product->caculationType}}</p>
                                </td >
                                <td class="text-center">
                                    <p class="c_name">{{$product->weight}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="c_name">{{$product->length}}</p>
                                </td>
                                <td class="text-center">
                                    
                                       @if( $product->enable == 1 )
                                        <span class="badge badge-success"> Hiện </span>
                                       @else
                                        <span class="badge badge-warning">Ẩn</span>
                                       @endif
                                   
                                </td>
                                
                                <td class="text-center" >                                            
                                    <button type="button" class="btn btn-info" title="Edit" data-toggle="modal" data-target="#myModal{{$i}}" ><i class="fa fa-edit"></i></button>

                                     
            <!-- Modal -->
              <div class="modal fade" id="myModal{{$i}}" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                             
                              <h4 class="text-center">Chỉnh Sửa Sản Phẩm: {{$product->nameProduct}}</h4>
                            </div>
                            <div class="modal-body">
                                <form id="basic-form" action={{route('product.editproduct')}} method="post" novalidate="">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="idproduct" value="{{$product->id}}">


                            <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-6">
                                <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="codeproduct" class="form-control" required="" value="{{$product->code}}">
                    </div>
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input type="text" name="nameproduct" class="form-control" required="" value="{{$product->nameProduct}}">
                    </div>
                    <div class="form-group">
                        <label>Quy Cách</label>
                        <input type="number" class="form-control" required="" name="caculationtype" value="{{$product->caculationType}}">
                    </div>
                    <div class="form-group">
                        <label>Kích hoạt</label>
                        <br>
                        <label class="fancy-radio">
                            <input type="radio" name="eable" value="eable" required="" @if($product->enable==1)
                                        checked
                                        @endif
                             data-parsley-errors-container="#error-radio" data-parsley-multiple="gender">
                            <span><i></i>Có</span>
                        </label>
                        <label class="fancy-radio">
                            <input type="radio" name="eable" value="uneable" data-parsley-multiple="gender" @if($product->enable==0)
                                        checked
                                        @endif
                                        >
                            <span><i></i>Không</span>
                        </label>
                        <p id="error-radio"></p>
                    </div>
                            </div>
                            <div class="col-md-6 col-md-6">
                                 <div class="form-group">
                        <label>Cân Nặng</label>
                        <input type="text" name="weight" class="form-control" required="" value="{{$product->weight}}">
                    </div>
                    <div class="form-group">
                        <label>Chiều Cao</label>
                        <input type="text" name="height" class="form-control" required="" value="{{$product->height}}">
                    </div>
                    <div class="form-group">
                        <label>Độ Dài</label>
                        <input type="number" class="form-control" required="" name="length" value="{{$product->length}}">
                    </div>
                    <div class="form-group">
                        <label>Độ Rộng</label>
                        <input type="number" class="form-control" required="" name="width" value="{{$product->width}}">
                    </div>
                            </div>
                        </div>
                    </div>
                            <br>
                            <button type="Submit" class="btn btn-primary">Sửa</button>
                            <button  id="cannelAddInventory" type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                        </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                  </div> 
                      <!-- End Modal -->
                                    <div style="display: inline-block;">
                                    <form id="basic-form" action="{{route('product.deleteproduct')}}" method="get" novalidate="">
                                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                                     <input type="hidden" name="idproductdelete" value="{{$product->id}}">
                                    <button type="Submit" data-type="confirm" class="btn btn-danger" title="Delete" onclick="return confirm('Bạn Có Muốn Xóa Sản Phẩm Này Không?');"><i class="fa fa-trash-o"></i></button></form>
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
                 <button type="button" id="addProduct"  class="btn btn-success">Thêm Sản Phẩm</button>
            </div>
            
        </div>
    </div>
<div class="row clearfix" id="contentAddProduct" style="display: none;">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Thêm Sản Phẩm</h2>
            </div>
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
                        <input type="number" class="form-control" required="" name="caculationtype">
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
                        <input type="text" name="weight" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Chiều Cao</label>
                        <input type="text" name="height" class="form-control" required="">
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