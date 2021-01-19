@extends('layouts.app_master_admin')
@section('content')

  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lí thương hiệu
        <small>Trademark</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.trademark.index')}}">Trademark</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header width-border">
        	<div class="box-header">
        		<h3 class="box-title"><a href="{{route('admin.trademark.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
        	</div>
        
	        <div class="box-body">
	        	<div class="col-md-12">
	          		<table class="table">
	                <tbody><tr>
	                  <th style="width: 10px">#</th>
	                  <th>Name</th>
	                  <th>Slug</th>
	                  <th>Avatar</th>
                    <th>Hot</th>
                    <th>Active</th>
	                  <th>Action</th>
	                </tr>

                  @foreach($trademarks as $trademark)
                  
                  <tr>
                    <td>{{$trademark['id']}}</td>
                    
                    <td>{{$trademark->trm_name}}</td>
                    <td>{{$trademark->trm_slug}}</td>
                     <td><img src="{{$trademark->image}}" height="57px" width="189px"></td>
                  
                    <td>
                      @if($trademark->trm_hot==1)
                        <a href="{{route('admin.trademark.hot',$trademark->id)}}" class="label label-info">Hot</a>
                      @else
                        <a href="{{route('admin.trademark.hot',$trademark->id)}}" class="label label-default">None</a> 
                     
                      @endif
                      </td>
                      <td>
                      @if($trademark->trm_active==1)
                        <a href="{{route('admin.trademark.active',$trademark->id)}}" class="label label-info">Hot</a>
                      @else
                        <a href="{{route('admin.trademark.active',$trademark->id)}}" class="label label-default">None</a> 
                     
                      @endif
                    
                    <td>
                    <td>
                      <a href="{{route('admin.trademark.update',$trademark->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil">Edit</i></a>
                      <a href="{{route('admin.trademark.delete',$trademark->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a> 
                    </td>
                  </tr>
                  @endforeach

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
 