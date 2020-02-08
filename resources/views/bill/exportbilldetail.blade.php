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
                                <th class="text-center">Tên Sản Phẩm</th>                                    
                                <th class="text-center">Số Lượng</th>                                    
                                <th class="text-center">Ghi Chú</th>
                                  <th class="text-center">Tác Vụ</th>
                               
                            </tr>
                        </thead>
                            <tbody>
                            @php $i = 0; @endphp
                            @foreach($exportDetails as $exportBillDetail )
                            @php $i++; @endphp
                            <tr data-href="{{route('pages.profile1')}}" style="height: 20px;"  >
                                <td class="text-center">
                                    <p class="c_name">{{$i}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="c_name">{{$exportBillDetail ->idProduct}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="c_name">{{$exportBillDetail ->numberOf}}</p>
                                </td>
                                <td class="text-center">
                                    <p class="c_name">{{$exportBillDetail ->attention}}</p>
                                </td >
                                
                                
                                <td class="text-center" >       
                                    <button type="button" class="btn btn-info" title="Sửa" data-toggle="modal" data-target="#myModal{{$i}}" ><i class="fa fa-pencil"></i></button>

                           <!------------------------------------------>

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
                <form id="basic-form" action="{{route('exportbilldetail.addexportbilldetail')}}" method="post" novalidate="">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 col-md-4">
                                <div class="form-group">
                        <label>Sản Phẩm</label>
                        <select name="idProduct" class="form-control">
                            @foreach($products as $product)
                            <option value="{{$product->id}}">
                                {{$product->nameProduct}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Số Lượng</label>
                        <input type="number" name="numberProduct" class="form-control" required="" min="0" >
                    </div>
                    <div class="form-group">
                        <label>Ghi Chú</label>
                        <input type="text" class="form-control" required="" name="attention" placeholder="Ghi Chú">
                    </div>
                    <br>
                    <div class="text-center">
                    <button type="Submit" class="btn btn-primary" style="width: 26%;">Thêm</button>
                    <button  id="cannelAddProduct" type="button" class="btn btn-danger" style="width: 26%;">Hủy</button>
                    </div>
                            </div>
                            <div class="col-md-6 col-md-6">
                            </div>
                        </div>
                    </div>
                    
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