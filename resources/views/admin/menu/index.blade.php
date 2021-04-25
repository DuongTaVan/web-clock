@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lí menu
        <small>Menu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.menu.index')}}">Menu</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
        	<div class="box-header">
        		<h3 class="box-title"><a href="{{route('admin.menu.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
        	</div>
        
	        <div class="box-body">
	        	<div class="col-md-12">
	          		<table class="table">
	                <tbody><tr>
	                  <th style="width: 10px">#</th>
	                  <th>Tên</th>
	                  <th>Hình ảnh</th>
	                  <th>Trạng thái</th>
	                  <th>Nổi bật</th>
                    <th>Thời gian</th>
	                  <th>Tùy chỉnh</th>
	                </tr>
                  @foreach($menu as $mn)
	                <tr>
	                  <td>{{$mn->id}}</td>
	                  <td>{{$mn->mn_name}}</td>
	                  <td>{{$mn->mn_avatar}}</td>
	                  <td>
                    @if($mn->mn_status ==1)
                      <a href="{{route('admin.menu.active',$mn->id)}}" class="label label-info">Show</a>
                    @else
                      <a href="{{route('admin.menu.active',$mn->id)}}" class="label label-default">Hide</a>
                    @endif
                    </td>
                    <td>
                    @if($mn->mn_hot==1)
                      <a href="{{route('admin.menu.hot',$mn->id)}}" class="label label-info">Hot</a>
	                  @else
                      <a href="{{route('admin.menu.hot',$mn->id)}}" class="label label-default">None</a> 
	                 
                    @endif
                    </td>
                    <td>{{$mn->created_at}}</td>
	                  <td>
                      <a href="{{route('admin.menu.update',$mn->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil">Edit</i></a>
                      <a href="{{route('admin.menu.delete',$mn->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a> 
                    </td>
	                
                  @endforeach
                  </tr>
	              </tbody></table>
                <div>{{$menu->links()}}</div>
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
 