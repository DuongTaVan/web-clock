@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lí slide
        <small>Slide</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.slide.index')}}">Slide</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
        	<div class="box-header">
        		<h3 class="box-title"><a href="{{route('admin.slide.create')}}" class="btn btn-xs btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
        	</div>
        
	        <div class="box-body">
	        	<div class="col-md-12">
	          		<table class="table">
	                <tbody><tr>
	                  <th style="width: 10px">#</th>
	                  <th>Tên</th>
	                  <th>Hiển thị</th>
	                  <th>Hình ảnh</th>
	                  <th>Nổi bật</th>
	                  <th>Hoạt động</th>
                      
	                  <th>Tùy chỉnh</th>
	                </tr>
	              @if(isset($slides))
                  @foreach($slides as $slide)
                  
                  <tr>
                    <td>{{$slide['id']}}</td>
                    
                    <td>{{$slide->s_name}}</td>
                    <td>{{$slide->s_slug}}</td>
                    
                    <td><img src="{{$slide->s_image}}" height="70px" width="330px"></td>
                  	<td>
                      @if($slide->s_hot==1)
                        <a href="{{route('admin.slide.hot',$slide->id)}}" class="label label-info">Hot</a>
                      @else
                        <a href="{{route('admin.slide.hot',$slide->id)}}" class="label label-default">None</a> 
                     
                      @endif
                      </td>
                      <td>
                      @if($slide->s_active==1)
                        <a href="{{route('admin.slide.active',$slide->id)}}" class="label label-info">Hot</a>
                      @else
                        <a href="{{route('admin.slide.active',$slide->id)}}" class="label label-default">None</a> 
                     
                      @endif
                    
                    <td>
                      <a href="{{route('admin.slide.update',$slide->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil">Edit</i></a>
                      <a href="{{route('admin.slide.delete',$slide->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a> 
                    </td>
                  </tr>
                  @endforeach
                 @endif

	              </tbody></table>
	              <div>{{$slides->links()}}</div>
	            </div>
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
 