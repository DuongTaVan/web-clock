@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lí sản phẩm
        <small>Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.product.index')}}">Product</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
            <div class="box-header">
                <h3 class="box-title"><a href="{{route('admin.product.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
            </div>
        
            <div class="box-body">
                <div class="col-md-12">
                    <table class="table">
                    <tbody><tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Avatar</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Hot</th>
                      <th>Status</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                    
                    @foreach($product as $pr)

                    <tr>
                      <td>{{$pr->id}}</td>
                      <td>{{$pr->pro_name}}</td>
                      <td><img src="{{pare_url_file($pr->pro_avatar)}}" width="50px" height="80px"></td>
                      <td><span class="label label-info">{{$pr->cate->c_name??"[N/A]"}}</span></td>
                      <td>
                        @if($pr->pro_sale == 0)
                        <span>{{number_format($pr->pro_price,0,",",".")}} đ</span>
                        
                        @else
                        <span style="text-decoration: line-through;">{{number_format($pr->pro_price,0,",",".")}} đ</span><br>
                        <span>{{number_format(($pr->pro_price)-($pr->pro_price)*($pr->pro_sale)/100,0,",",".")}} đ</span>
                        @endif 


                      </td>
                      <td>
                      @if($pr->pro_hot==1)
                        <a href="{{route('admin.product.hot',$pr->id)}}" class="label label-info">Hot</a>
                      @else
                        <a href="{{route('admin.product.hot',$pr->id)}}" class="label label-default">None</a> 
                     
                      @endif
                      </td>
                      <td>
                      @if($pr->pro_active==1)
                        <a href="{{route('admin.product.active',$pr->id)}}" class="label label-info">Hot</a>
                      @else
                        <a href="{{route('admin.product.active',$pr->id)}}" class="label label-default">None</a> 
                     
                      @endif
                    </td>
                      <td>{{$pr->created_at}}</td>
                      <td>
                        <a href="{{route('admin.product.update',$pr->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil">Edit</i></a>
                        <a href="{{route('admin.product.delete',$pr->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a> 
                      </td>
                    </tr>
                    @endforeach
                   
                  </tbody></table>
                  <div>{{$product->links()}}</div>

                </div>
            </div>
            <div>
              
            </div>
        </div>

        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->


@endsection
 