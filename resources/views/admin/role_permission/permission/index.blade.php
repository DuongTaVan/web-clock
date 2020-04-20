@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lí danh mục Permission
        <small>Permission</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('permission.list')}}">Permission</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
        	<div class="box-header">
        		<h3 class="box-title"><a href="{{route('permission.add')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
        	</div>
        
	        <div class="box-body">
	        	<div class="col-md-12">
	          		<table class="table">
	                <tbody><tr>
	                  <th style="width: 10px">#</th>
	                  <th>Name</th>
	                 
	                  <th>Display Name</th>
	                  <th>Time</th>
	                  <th>Action</th>
	                </tr>
                  @foreach($permissions as $permission)
	                <tr>
	                  <td>{{$permission->id}}</td>
	                  <td>{{$permission->name}}</td>
	                  <td>{{$permission->display_name}}</td>
	       
                      <td>{{$permission->created_at}}</td>
	                  <td>
                      <a href="{{route('permission.edit',$permission->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil">Edit</i></a>
                      <a href="{{route('permission.delete',$permission->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a> 
                    </td>
	                
                  @endforeach
                  </tr>
	              </tbody></table>
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
