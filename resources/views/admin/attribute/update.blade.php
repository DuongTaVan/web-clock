@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sửa thuộc tính
        <small>Attribute</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.attribute.index')}}">Attribute</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
        	
        
	        <div class="box-body">
	        	<div class="col-md-8">
	          		
			           
			            <!-- /.box-header -->
			            <!-- form start -->
			           
			            <form role="form" action="" method="POST">
			            	@csrf
			              
			                <div class="form-group">
			                  <label >Name <span class="text-danger">(*)</span></label>
			                  <input type="text" name="atb_name" value="{{$attribute->atb_name}}" class="form-control"  placeholder="Name ...">
			                  {!!showErrors($errors,'atb_name')!!}
			                </div>

							
							<div class="form-group">
								<label for="name">Group <span class="text-danger">(*)</span></label>
								<select class="form-control" name="atb_type">
									<option value="1" {{$attribute->atb_type==1?"selected = selected" : ""}}>Đôi</option>
									<option value="2" {{$attribute->atb_type==2?"selected = selected" : ""}}>Năng lượng</option>
									<option value="3" {{$attribute->atb_type==3?"selected = selected" : ""}}>Loại dây</option>
									<option value="4" {{$attribute->atb_type==4?"selected = selected" : ""}}>Loại vỏ</option>
								</select>
								{!!showErrors($errors,'atb_type')!!}
							</div>
						
						
							<div class="form-group">
								<label for="name">Category <span class="text-danger">(*)</span></label>
								<select class="form-control" name="atb_category_id">
									@foreach($category as $cate)
									<option value="{{$cate->id}}" {{$attribute->atb_category_id==$cate->id?" selected" : ""}}>{{$cate->c_name}}</option>
									@endforeach
								</select>
								{!!showErrors($errors,'atb_category_id')!!}
							</div>
							
							
			             

			              <div class="box-footer text-center">
			                <button type="submit" class="btn btn-primary"> Save <i class="fa fa-save"></i></button>
			                <a href="{{route('admin.attribute.index')}}" class="btn btn-primary">Quay lại <i class="fa fa-undo"></i></a>
			              </div>
			            </form>
			        
	            </div>
	        </div>
        </div>

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->


@endsection
 