@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lí kho
        <small>Warehouse</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.warehouse.index')}}">Kho</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
          <div class="box-title">
                    <form class="form-inline">
                        <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="id ...">
                        <select name="category" class="form-control">
                            <option value="0">Phân loại theo danh mục</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{Request::get('category')== $category->id ? "selected" : ""}}>{{$category->c_name}}</option>
                            @endforeach
                        </select>
                        <select name="type" class="form-control">
                            <option value="0">Phân loại theo thị trường</option>
                            <option value="1" {{Request::get('type')== 1 ? "selected" : ""}} >Bán chạy</option>
                            <option value="2" {{Request::get('type')== 2 ? "selected" : ""}}>Tồn kho</option>
                            <option value="3" {{Request::get('type')== 3 ? "selected" : ""}}>Xem nhiều</option>
                            <option value="4" {{Request::get('type')== 4 ? "selected" : ""}}>Đánh giá</option>
                        </select>
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                        <button type="submit" name="export" value="true" class="btn btn-info">
                            <i class="fa fa-save"></i> Export
                        </button>
                    </form>
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
                    <th>Sold</th>  
                    <th>Rest</th>  
                    <th>View</th>
                    <th>Review</th> 
	                  
	                </tr>
                  @if(isset($warehoses))
                  @foreach($warehoses as $warehouse)
                  
                  <tr>
                    <td>{{$warehouse['id']}}</td>
                    
                    <td>{{$warehouse->pro_name}}</td>

                    <td><img src="{{pare_url_file($warehouse->pro_avatar)}}" width="70px" height="80px"></td>
                    <td>{{$warehouse->cate->c_name ?? '[N\A]'}}</td>
                    
                    <td>{{$warehouse->pro_price}}</td>
                    <td>{{$warehouse->pro_pay}}</td>
                    <td>{{$warehouse->pro_number}}</td>
                    <td>{{$warehouse->pro_view}}</td>
                    <td>{{$warehouse->pro_review_total}}</td>
                    
                    
                  </tr>
                  @endforeach
                  @endif
	              </tbody></table>
	            </div>
              <div>{{$warehoses->appends($query)->links()}}</div>
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
 